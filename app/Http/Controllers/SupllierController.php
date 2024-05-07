<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class SupllierController extends Controller
{
    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_supplier(){
        $this->AuthLogin();
        return view('admin.supplier.add_supplier');

    }
    public function all_supplier(){
        $this->AuthLogin();
        $all_supplier = DB::table('supplier_table')->get();
        return view('admin.supplier.all_supplier', ['all_supplier' => $all_supplier]);
    }    
    public function save_supplier(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['supplier_name'] = $request->supplier_name;
        $data['supplier_phone'] = $request->supplier_phone;
        $data['supplier_address'] = $request->supplier_address;

        DB::table('supplier_table')->insert($data);
        Session()->put('message','Thêm nhà cung cấp thành công');
        return redirect::to('all-supplier');
        
    }
    public function edit_supplier($supplier_id){
        $this->AuthLogin();
        $all_supplier = DB::table('supplier_table')->where('supplier_id', $supplier_id)->get();
        return view('admin.supplier.edit_supplier', ['all_supplier' => $all_supplier]);
    }
    public function update_supplier(Request $request, $supplier_id){
        $data = array();
        $data['supplier_name'] = $request->supplier_name;
        $data['supplier_phone'] = $request->supplier_phone;
        $data['supplier_address'] = $request->supplier_address;

        DB::table('supplier_table')->where('supplier_id', $supplier_id)->update($data);
        Session()->put('message','Sửa nhà cung cấp thành công');
        return redirect::to('all-supplier');
    }
    public function delete_supplier($supplier_id){
        $this->AuthLogin();
        DB::table('supplier_table')->where('supplier_id', $supplier_id)->delete();
        Session()->put('message','Xóa nhà cung cấp thành công');
        return redirect::to('all-supplier');
    }
}
