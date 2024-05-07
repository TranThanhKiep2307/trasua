<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){
        $cate_product = DB::table('category_product_table')->orderBy('category_id')->get();
        $all_product = DB::table('product_table')
        ->join('category_product_table', 'category_product_table.category_id', 'product_table.category_id')
        ->where('product_table.product_status', 0)
        ->paginate(8);
        return view('pages.home')-> with('category', $cate_product)->with('all_product',$all_product);
    }

    public function search(Request $request){
        $keyword = $request->input('keyword_submit');
        $categoryId = $request->input('category_id');
    
        // Lấy danh sách danh mục sản phẩm
        $categories = DB::table('category_product_table')->orderBy('category_id')->get();
    
        // Tìm kiếm sản phẩm dựa trên từ khóa và/hoặc danh mục
        $query = DB::table('product_table')
        ->join('category_product_table', 'category_product_table.category_id', 'product_table.category_id');
    
        if (!empty($keyword)) {
            $query->where('product_table.product_name', 'like', "%$keyword%")
                  ->orWhere('category_product_table.category_name', 'like', "%$keyword%")
                  ->orWhere('product_table.product_decs', 'like', "%$keyword%");
        }
    
        if (!empty($categoryId)) {
            $query->where('product_table.category_id', $categoryId);
        }
    
        $search_product = $query->get();
    
        return view('pages.product.search')
                ->with('category', $categories)
                ->with('search_product', $search_product) 
                ->with('keyword', $keyword)
                ->with('categoryId', $categoryId);
    }
    // public function all_cmt(){
    //     $all_cmt = DB::table('customer_table')
    //         ->join('product_table', 'comment_table.product_id', 'product_table.product_id')
    //         ->join('customer_table', 'comment_table.customer_id', 'customer_table.customer_id')
    //         ->get();
            
    //     // Lấy category_id từ dữ liệu chi tiết sản phẩm
    //     return view('pages.product.details_product')
    //             ->with('all_cmt', $all_cmt);
    // }
        
    public function add_cmt(Request $request){
    
        // Lấy customer_id từ session
        $customer_id = Session()->get('customer_id');
    
        $data = array();
        $data['cm_star'] = $request->cm_star;
        $data['cm_cmt'] = $request->cm_cmt;
        $data['product_id'] = $request->product_id;
        $data['cm_answer'] = null;
        $data['updated_at'] = null;
        $data['customer_id'] = $customer_id;
        $data['created_at'] = now();

        DB::table('comment_table')->insert($data);
        Session()->put('message','Thêm danh mục sản phẩm thành công');
        return redirect()->back();
    }
}