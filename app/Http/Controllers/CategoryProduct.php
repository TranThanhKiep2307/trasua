<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if($admin_id){
            return Redirect::to('admin.dashboard')->send();
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_product(){
        $this->AuthLogin();
        return view('admin.add_category_product');

    }
    public function all_category_product(){
        $this->AuthLogin();
        $all_category_product = DB::table('category_product_table')->get();
        return view('admin.all_category_product', ['all_category_product' => $all_category_product]);
    }    
    public function save_category_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_decs'] = $request->category_decs;

        DB::table('category_product_table')->insert($data);
        Session()->put('message','Thêm danh mục sản phẩm thành công');
        return redirect::to('add-category-product');
    }
    public function edit_category_product($category_id){
        $this->AuthLogin();
        $edit_category_product = DB::table('category_product_table')->where('category_id', $category_id)->get();
        return view('admin.edit_category_product', ['edit_category_product' => $edit_category_product]);
    }
    public function update_category_product(Request $request, $category_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_decs'] = $request->category_decs;

        DB::table('category_product_table')->where('category_id', $category_id)->update($data);
        Session()->put('message','Cập nhật danh mục sản phẩm thành công');
        return redirect::to('all-category-product');
    }
    public function delete_category_product($category_id){
        $this->AuthLogin();
        DB::table('category_product_table')->where('category_id', $category_id)->delete();
        Session()->put('message','Xóa danh mục sản phẩm thành công');
        return redirect::to('all-category-product');
    }
}
