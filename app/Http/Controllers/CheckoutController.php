<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Spatie\FlareClient\View;
use Illuminate\Support\Facades\Cookie;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Card;


class CheckoutController extends Controller
{
    public function login_checkout(){
        $cate_product = DB::table('category_product_table')->orderBy('category_id')->get();

        return view('pages.checkout.login_checkout')->with('category', $cate_product);
    }
    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = $request->customer_password;
    
        $insert_customer_id = DB::table('customer_table')->insertGetId($data);
    
        session()->put('customer_id', $insert_customer_id);
        session()->put('customer_name', $request->customer_name);
    
        return redirect('/checkout');
    }
    
    public function checkout(){
        $cate_product = DB::table('category_product_table')->orderBy('category_id')->get();

        return view('pages.checkout.show_checkout')->with('category', $cate_product);
    }
    
    public function save_checkout(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_ynnote'] = $request->shipping_ynnote;
        $data['shipping_infnote'] = $request->shipping_infnote;

        $shipping_id = DB::table('shipping_table')->insertGetId($data);
        session()->put('shipping_id', $shipping_id);
        return Redirect::to('/payment');
    }

    public function payment(){
        $cate_product = DB::table('category_product_table')->orderBy('category_id')->get();

        return view('pages.checkout.payment')->with('category', $cate_product);
    }
    
    public function login_customer(Request $request){
        $email = $request->email_acc;
        $password = $request->password_acc;
        $remember = $request->has('remember'); // Kiểm tra xem người dùng đã chọn "Ghi nhớ đăng nhập" hay không
    
        $result = DB::table('customer_table')
            ->where('customer_email', $email)
            ->orwhere('customer_phone', $email)
            ->where('customer_password', $password)
            ->first();
    
        if($result){
            session()->put('customer_id', $result->customer_id);
            session()->put('customer_name', $result->customer_name);
    
            // Nếu người dùng chọn "Ghi nhớ đăng nhập", lưu thông tin đăng nhập vào cookie
            if ($remember) {
                Cookie::queue('customer_email', $email, 60*24*30); // Lưu trong 30 ngày
                Cookie::queue('customer_password', $password, 60*24*30); // Lưu trong 30 ngày
            }
    
            return redirect::to('/');
        } else {
            return redirect::to('/login-checkout');
        }
    }
    
    public function show_customer(){
        if(session()->has('customer_id')){
            // Nếu đã đăng nhập, lấy thông tin khách hàng từ cơ sở dữ liệu
            $customer = DB::table('customer_table')
                        ->where('customer_id', session('customer_id'))
                        ->first();
            $cate_product = DB::table('category_product_table')->orderBy('category_id')->get();
            // Kiểm tra nếu tìm thấy thông tin khách hàng
            if($customer){
                // Hiển thị thông tin khách hàng
                return view('pages.show_customer', ['customer' => $customer], ['category'=>$cate_product]);
            } else {
                // Nếu không tìm thấy thông tin khách hàng, chuyển hướng về trang đăng nhập
                return redirect::to('/login-checkout');
            }
        } else {
            // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
            return redirect::to('/login-checkout');
        }
    }
    public function update_customer($customer_id, Request $request){
        // Lấy thông tin mới từ request
        $customer_name = $request->input('customer_name');
        $customer_email = $request->input('customer_email');
        $customer_phone = $request->input('customer_phone');
        $customer_password = $request->input('customer_password');
    
        // Cập nhật thông tin khách hàng trong cơ sở dữ liệu
        $update = DB::table('customer_table')
                  ->where('customer_id', $customer_id)
                  ->update([
                      'customer_name' => $customer_name,
                      'customer_email' => $customer_email,
                      'customer_phone' => $customer_phone,
                      'customer_password' => $customer_password
                  ]);
    
        // Kiểm tra xem cập nhật có thành công hay không
        if($update){
            // Nếu cập nhật thành công, lưu thông báo vào session
            session()->flash('success', 'Cập nhật thông tin thành công.');
        } else {
            // Nếu cập nhật không thành công, lưu thông báo vào session
            session()->flash('error', 'Cập nhật thông tin không thành công.');
        }
    
        // Chuyển hướng về trang hiển thị thông tin khách hàng hoặc trang cập nhật thông tin
        return redirect()->back();
    }
    public function logout_checkout(){
        if (session()->has('customer_id')) {
            // Xoá session 'customer_id'
            session()->forget('customer_id');
            session()->forget('customer_name');

        }
        // Chuyển hướng người dùng đến trang đăng nhập
        return Redirect::to('/login-checkout');
    }
    public function order_place(Request $request){
        //get payment method 
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_stt'] = 'Đang chờ xử lý';

        $payment_id = DB::table('payment_table')->insertGetId($data);

        //insert order        
        $order_data = array();
        $order_data['customer_id'] = session()->get('customer_id');
        $order_data['shipping_id'] = session()->get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] =  number_format(Cart::subtotal(), 0, ',', '.');
        $order_data['order_stt'] = '0';

        $order_id = DB::table('order_table')->insertGetId($order_data);

        //insert order details
        $content = Cart::content();
        foreach($content as $v_content){
            $order_d_data = array();
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_qty'] = $v_content->qty;
            $order_d_data = DB::table('order_details_table')->insertGetId($order_d_data);
        }
        
        if( $data['payment_method'] == '1'){
            Cart::destroy();

            $cate_product = DB::table('category_product_table')->orderBy('category_id')->get();

            return view('pages.checkout.handcash')->with('category', $cate_product);
        }elseif( $data['payment_method'] == '2'){
            Cart::destroy();

            $cate_product = DB::table('category_product_table')->orderBy('category_id')->get();

            return view('pages.checkout.cardpayment')->with('category', $cate_product);
        }
    }

    //admin order
    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function manager_order(){
        $this->AuthLogin();
        $all_order = DB::table('order_table')
        ->join('customer_table', 'order_table.customer_id', 'customer_table.customer_id')
        ->join('payment_table','order_table.payment_id' , 'payment_table.payment_id')
        ->join('shipping_table', 'order_table.shipping_id', 'shipping_table.shipping_id')
        ->select('order_table.*', 'customer_table.customer_name', 'payment_table.payment_method'
        , 'payment_table.payment_stt', 'shipping_table.shipping_address')
        ->orderByDesc('order_table.order_id')->get();
        $manager_order = view('admin.manager_order')->with('all_order', $all_order);

        return view('admin_layout')->with('admin.manager_order', $manager_order);
    }

    public function view_order($order_id){
        $this->AuthLogin();
        // Lấy thông tin chung của đơn hàng
        $order_by_id = DB::table('order_table')
            ->join('customer_table', 'order_table.customer_id', 'customer_table.customer_id')
            ->join('payment_table','order_table.payment_id' , 'payment_table.payment_id')
            ->join('shipping_table', 'order_table.shipping_id', 'shipping_table.shipping_id')
            ->where('order_table.order_id', $order_id)
            ->first(); // Thay đổi từ get() thành first() để chỉ lấy một đơn hàng duy nhất
    
        // Lấy các chi tiết đơn hàng cho đơn hàng cụ thể này
        $order_details = DB::table('order_details_table')
            ->join('order_table', 'order_details_table.order_id', '=', 'order_table.order_id')
            ->join('shipping_table', 'order_table.shipping_id', '=', 'shipping_table.shipping_id')
            ->where('order_table.order_id', $order_id)
            ->select('order_details_table.*', 'shipping_table.shipping_infnote')
            ->get();
    
        return view('admin.view_order', ['order_by_id' => $order_by_id, 'order_details' => $order_details]);
    }
    
    
    public function delete_order($order_id){
        $this->AuthLogin();
        // Xóa các chi tiết đơn hàng
        DB::table('order_details_table')
            ->where('order_id', $order_id)
            ->delete();
    
        // Xóa thông tin thanh toán
        DB::table('payment_table')
            ->join('order_table', 'payment_table.payment_id', '=', 'order_table.payment_id')
            ->where('order_table.order_id', $order_id)
            ->delete();
    
        // Xóa đơn hàng
        DB::table('order_table')
            ->where('order_id', $order_id)
            ->delete();
    
        // Redirect về trang manager_order và hiển thị thông báo thành công
        return redirect::to('/manager-order')->with('success', 'Đơn hàng đã được xóa thành công.');
    }
    
    public function check_discount(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $coupon = DB::table('counpon_table')->where('counpon_code', $data['counpon'])->first();
        if($coupon){
            // Không cần kiểm tra $coupon->count() nữa
            $coupon_session = session()->get('coupon');
            if($coupon_session == true){
                $is_available = 0;
                if($is_available == 0){
                    $coupon_data = [
                        'counpon_code' => $coupon->counpon_code,
                        'counpon_condition' => $coupon->counpon_condition,
                        'counpon_number' => $coupon->counpon_number,
                    ];
                    session()->put('coupon', [$coupon_data]);
                }
            }else{
                $coupon_data = [
                    'counpon_code' => $coupon->counpon_code,
                    'counpon_condition' => $coupon->counpon_condition,
                    'counpon_number' => $coupon->counpon_number,
                ];
                session()->put('counpon', [$coupon_data]);
            }
            session()->save();
            return redirect()->back()->with('message', 'Áp dụng mã giảm giá thành công');
        } else {
            return redirect()->back()->with('error', 'Áp dụng mã giảm giá thất bại');
        }
    }
    public function change_order($order_id){
        $this->AuthLogin();
        $order = DB::table('order_table')->where('order_id', $order_id)->get();
        // Chuyển hướng về trang hiển thị thông tin khách hàng hoặc trang cập nhật thông tin
        return view('admin.change_order')->with('order', $order);
    }
    public function update_stt_order(Request $request, $order_id){
        $this->AuthLogin();
        
        // Lấy giá trị trạng thái đơn hàng từ biểu mẫu
        $order_stt = $request->input('order_stt');
    
        // Tạo một mảng chứa dữ liệu cần cập nhật
        $data = [
            'order_stt' => $order_stt
        ];
    
        // Cập nhật trạng thái của đơn hàng trong cơ sở dữ liệu
        DB::table('order_table')->where('order_id', $order_id)->update($data);
    
        // Đặt thông báo thành công vào Session
        session()->flash('success', 'Cập nhật trạng thái thành công');
    
        // Chuyển hướng về trang quản lý đơn hàng
        return redirect::to('manager-order');
    }
    
}
