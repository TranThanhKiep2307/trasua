<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function add_category_product(){
        return view('admin.add_category_product');

    }
    public function all_category_product(){
        return view('admin.all_category_product');
    }
    public function save_category_product(Request $request){
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_decs'] = $request->category_decs;

        DB::table('category_product_table')->insert($data);
        Session()->put('message','Thêm danh mục sản phẩm thành công');
        return redirect::to('add-category-product');
    }
}
