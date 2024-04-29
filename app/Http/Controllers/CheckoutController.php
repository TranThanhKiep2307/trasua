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
}
