<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Spatie\FlareClient\View;
use Gloudemans\Shoppingcart\Facades\Cart;

session_start();

class CartController extends Controller
{
    public function save_cart(Request $request){
        $productid = $request->pro_id;
        $quantity = $request->qty;
        $product_info = DB::table('product_table')
        ->join('category_product_table', 'category_product_table.category_id', 'product_table.category_id')
        ->where('product_table.product_id', $productid)
        ->get();
    
        if ($product_info->isNotEmpty()) {
            foreach ($product_info as $product) {
                $data['id'] = $product->product_id;
                $data['qty'] = $quantity;
                $data['name'] = $product->product_name;
                $data['price'] = $product->product_price;
                $data['weight'] = $product->product_price;
                $data['options']['image'] = $product->product_image;
    
                Cart::add($data);
            }
    
            // Cart::destroy(); để xóa toàn bộ sản phẩm khỏi giỏ hàng.
            return Redirect::to('/show-cart');
        } else {
            // Xử lý khi không tìm thấy sản phẩm
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }
    }
    
    
    public function show_cart(){
        $cate_product = DB::table('category_product_table')->orderBy('category_id')->get();
        return view('pages.cart.show_cart')->with('category', $cate_product);

    }
    public function delete_cart($rowId){
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }
    public function update_qty_cart(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->quantity_cart;
        Cart::update($rowId, $qty);
        return Redirect::to('/show-cart');

    }
}
