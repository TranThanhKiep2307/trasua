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
    
    public function logout_checkout(){
        if (session()->has('customer_id')) {
            // Xoá session 'customer_id'
            session()->forget('customer_id');
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
        $order_data['order_total'] = Cart::total();
        $order_data['order_stt'] = 'Đang chờ xử lý';

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
        
        if( $data['payment_method'] == 'Tiền mặt'){
            Cart::destroy();

            $cate_product = DB::table('category_product_table')->orderBy('category_id')->get();

            return view('pages.checkout.handcash')->with('category', $cate_product);
        }else{
            Cart::destroy();
            echo 'Thanh toán chuyển khoản';
        }
    }

}
