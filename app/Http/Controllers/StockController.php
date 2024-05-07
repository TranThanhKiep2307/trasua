<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Spatie\FlareClient\View;
use Carbon\Carbon;


class StockController extends Controller
{
    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function list_material(){
        $this->AuthLogin();
        $list_material = DB::table('product_table')
        ->join('category_product_table', 'category_product_table.category_id', 'product_table.category_id')
        ->join('finished_product_table', 'product_table.product_id', 'finished_product_table.product_id')
        ->paginate(5);
        return view('admin.stock.list_material', ['list_material' => $list_material]);
    }
    public function edit_list_material($product_id){
        $this->AuthLogin();
        $new_endpro_number = request()->input('endpro_number');
    
    // Cập nhật dữ liệu của sản phẩm trong bảng finished_product_table
        DB::table('finished_product_table')
            ->where('product_id', $product_id)
            ->update(['endpro_number' => $new_endpro_number]);
        return Redirect()->back();
    }
    public function static_material(){
        $this->AuthLogin();
        $productQuantities = DB::table('finished_product_table')
            ->join('product_table', 'finished_product_table.product_id', '=', 'product_table.product_id')
            ->join('category_product_table', 'category_product_table.category_id', '=', 'product_table.category_id')
            ->select('category_product_table.category_id','category_product_table.category_name', DB::raw('SUM(finished_product_table.endpro_number) as total_quantity'))
            ->groupBy('category_product_table.category_id','category_product_table.category_name')
            ->get();

        return view('admin.stock.static', ['productQuantities' => $productQuantities]);
    }
    public function turnover(){
        $this->AuthLogin();
        // Thống kê theo ngày
            $turnoverByDay = DB::table('order_table')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(order_total) as total_turnover'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();

        // Thống kê theo tháng
        $turnoverByMonth = DB::table('order_table')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(order_total) as total_turnover'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Thống kê theo năm
        $turnoverByYear = DB::table('order_table')
            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('SUM(order_total) as total_turnover'))
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->get();

        return view('admin.system.turnover', [
            'turnoverByDay' => $turnoverByDay,
            'turnoverByMonth' => $turnoverByMonth,
            'turnoverByYear' => $turnoverByYear,
        ]);
    }
    public function dashboard()
    {
        $this->AuthLogin();
        // Tính toán doanh số trong ngày
        $dailyIncome = DB::table('order_table')
                        ->whereDate('created_at', Carbon::today())
                        ->sum('order_total');

        // Tính toán doanh số trong tuần
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $weeklyIncome = DB::table('order_table')
                        ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
                        ->sum('order_total');

        // Phần trăm tăng trưởng doanh số trong ngày
        $dailyIncomePercentage = $this->calculatePercentage($dailyIncome, $dailyIncome);

        // Phần trăm tăng trưởng doanh số trong tuần
        $weeklyIncomePercentage = $this->calculatePercentage($weeklyIncome, $dailyIncome);

        return view('admin.dashboard', [
            'dailyIncome' => $dailyIncome,
            'dailyIncomePercentage' => $dailyIncomePercentage,
            'weeklyIncome' => $weeklyIncome,
            'weeklyIncomePercentage' => $weeklyIncomePercentage,
        ]);
    }

    // Hàm tính phần trăm tăng trưởng
    private function calculatePercentage($currentValue, $previousValue)
    {
        $this->AuthLogin();
        if ($previousValue == 0) {
            return 0;
        }
        $percentage = round(($currentValue - $previousValue) / $previousValue * 100, 2);
        return number_format($percentage, 2, '.', ',') . '%';
    }
    public function comment(){
        $all_cmt = DB::table('comment_table')
            ->join('product_table', 'comment_table.product_id', 'product_table.product_id')
            ->join('customer_table', 'comment_table.customer_id', 'customer_table.customer_id')
            ->paginate(10);
            
        // Lấy category_id từ dữ liệu chi tiết sản phẩm
        return view('admin.system.comment')
                ->with('all_cmt', $all_cmt);
    }
    public function edit_cm(Request $request, $cm_id){
        $admin_reply = $request->input('admin_reply');

        // Cập nhật câu trả lời của admin vào cơ sở dữ liệu
        $admin_reply = $request->input('admin_reply');
        $current_time = Carbon::now();

        // Cập nhật câu trả lời của admin và thời gian cập nhật vào cơ sở dữ liệu
        DB::table('comment_table')
            ->where('cm_id', $cm_id)
            ->update([
                'cm_answer' => $admin_reply,
                'updated_at' => $current_time
            ]);

        // Chuyển hướng người dùng đến trang cụ thể hoặc làm một hành động phù hợp
        return redirect()->back()->with('success', 'Cập nhật câu trả lời thành công!');
    }
}
