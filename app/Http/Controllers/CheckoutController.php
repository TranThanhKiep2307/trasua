<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Spatie\FlareClient\View;

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

    }
    
    public function login_customer(Request $request){
        $email = $request->email_acc;
        $password = $request->password_acc;
    
        $result = DB::table('customer_table')
            ->where('customer_email', $email)
            ->where('customer_password', $password)
            ->first();
    
        if($result){
            session()->put('customer_id', $result->customer_id);
            return redirect('/');
        } else {
            return redirect('/login-checkout');
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

}
