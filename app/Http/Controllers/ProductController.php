<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard')->send();
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('category_product_table')->orderBy('category_id')->get();
        return view('admin.add_product')->with('cate_product',$cate_product);
    }
    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('product_table')->join('category_product_table', 'category_product_table.category_id', 'product_table.category_id')
        ->orderByDesc('product_table.product_id')->get();
        return view('admin.all_product', ['all_product' => $all_product]);
    }    
    public function save_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_decs'] = $request->product_decs;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->category_product;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/images/products',$new_image);
            $data['product_image'] = $new_image;
            DB::table('product_table')->insert($data);
            Session()->put('message','Thêm sản phẩm thành công');
            return redirect::to('all-product');
        }
        $data['product_image'] = '';
        DB::table('product_table')->insert($data);
        Session()->put('message','Thêm sản phẩm thành công');
        return redirect::to('all-product');
    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('category_product_table')->get();
        $edit_product = DB::table('product_table')->where('product_id', $product_id)->get();
        return view('admin.edit_product', ['edit_product' => $edit_product, 'cate_product' => $cate_product]);
    }
    public function update_product(Request $request, $product_id){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_decs'] = $request->product_decs;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->category_product;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/images/products',$new_image);
            $data['product_image'] = $new_image;
            DB::table('product_table')->where('product_id',$product_id)->update($data);
            Session()->put('message','Cập nhật sản phẩm thành công');
            return redirect::to('all-product');
        }
        DB::table('product_table')->where('product_id',$product_id)->update($data);
        Session()->put('message','Cập nhật sản phẩm thành công');
        return redirect::to('all-product');
    }
    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('product_table')->where('product_id', $product_id)->delete();
        Session()->put('message','Xóa sản phẩm thành công');
        return redirect::to('all-product');
    }
    public function on_product($product_id){
        $this->AuthLogin();
        DB::table('product_table')->where('product_id', $product_id)->update(['product_status'=> 0]);
        Session()->put('message','Kích hoạt sản phẩm');
        return redirect::to('all-product');
    }
    public function off_product($product_id){
        $this->AuthLogin();
        DB::table('product_table')->where('product_id', $product_id)->update(['product_status'=> 1]);
        Session()->put('message','Dừng bán sản phẩm');
        return redirect::to('all-product');
    }
}
