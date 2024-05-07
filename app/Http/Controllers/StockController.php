<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Spatie\FlareClient\View;

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
        $list_material = DB::table('product_table')->join('category_product_table', 'category_product_table.category_id', 'product_table.category_id')
        ->orderByDesc('product_table.product_id')->paginate(10);
        return view('admin.stock.list_material', ['list_material' => $list_material]);
    }
}
