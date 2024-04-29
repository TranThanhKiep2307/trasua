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
        $all_product = DB::table('product_table')->join('category_product_table', 'category_product_table.category_id', 'product_table.category_id')
        ->limit(8)->get();
        return view('pages.home')-> with('category', $cate_product)->with('all_product',$all_product);
    }
}
