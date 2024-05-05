<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Spatie\FlareClient\View;

class CounponController extends Controller
{
    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function insert_counpon(){
        $this->AuthLogin();
        return view('admin.counpon.insert_counpon');
    }
    public function insert_counpon_code(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['counpon_name'] = $request->counpon_name;
        $data['counpon_code'] = $request->counpon_code;
        $data['counpon_time'] = $request->counpon_time;
        $data['counpon_condition'] = $request->counpon_condition;
        $data['counpon_number'] = $request->counpon_number;
        
        DB::table('counpon_table')->insert($data);
        Session()->put('message','Thêm mã giảm giá thành công');
        return redirect::to('list-counpon');
    }

    public function list_counpon(){
        $this->AuthLogin();
        $all_counpon = DB::table('counpon_table')->get();
        return view('admin.counpon.list_counpon', ['all_counpon' => $all_counpon]);
    }
    public function edit_counpon($counpon_id){
        $this->AuthLogin();
        $edit_counpon = DB::table('counpon_table')->where('counpon_id', $counpon_id)->get();
        return view('admin.counpon.edit_counpon', ['all_counpon' => $edit_counpon]);
    }
    public function update_counpon(Request $request, $counpon_id){
        $this->AuthLogin();
        $data = array();
        $data['counpon_name'] = $request->counpon_name;
        $data['counpon_code'] = $request->counpon_code;
        $data['counpon_time'] = $request->counpon_time;
        $data['counpon_condition'] = $request->counpon_condition;
        $data['counpon_number'] = $request->counpon_number;

        DB::table('counpon_table')->where('counpon_id', $counpon_id)->update($data);
        Session()->put('message','Cập nhật mã giảm giá phẩm thành công');
        return redirect::to('list-counpon');
    }
    public function delete_counpon($counpon_id){
        $this->AuthLogin();
        DB::table('counpon_table')->where('counpon_id', $counpon_id)->delete();
        Session()->put('message','Xóa mã giảm giá thành công');
        return redirect::to('list-counpon');
    }
    public function unset_counpon(){
        $counpon = session()->get('counpon');
        if($counpon == true){
            session()->forget('counpon');
            return redirect()->back()->with('message', 'Hủy áp dụng mã thành công');
        }
    }
}
