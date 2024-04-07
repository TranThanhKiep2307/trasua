<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function add_product(){
        $cate_product = DB::table('category_product_table')->orderBy('category_id')->get();
        return view('admin.add_product')->with('cate_product',$cate_product);
    }
    public function all_product(){

        $all_product = DB::table('product_table')->orderByDesc('product_id')->get();
        return view('admin.all_product', ['all_product' => $all_product]);
    }    
    public function save_product(Request $request){
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
            return redirect::to('add-product');
        }
        $data['product_image'] = '';
        DB::table('product_table')->insert($data);
        Session()->put('message','Thêm sản phẩm thành công');
        return redirect::to('add-product');
    }
    public function edit_product($product_id){
        // $cate_product = DB::table('category_product_table')->orderBy('category_id')->get();
        $edit_product = DB::table('product_table')->where('product_id', $product_id)->get();
        return view('admin.edit_product', ['edit_product' => $edit_product]);
    }
    public function update_product(Request $request, $product_id){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_decs'] = $request->product_decs;

        DB::table('product_table')->where('product_id', $product_id)->update($data);
        Session()->put('message','Cập nhật danh mục sản phẩm thành công');
        return redirect::to('all-product');
    }
    public function delete_product($product_id){
        DB::table('product_table')->where('product_id', $product_id)->delete();
        Session()->put('message','Xóa danh mục sản phẩm thành công');
        return redirect::to('all-product');
    }
}
