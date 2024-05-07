<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class MaterialController extends Controller
{
    public function AuthLogin(){
        $admin_id = session()->get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_material(){
        $this->AuthLogin();
        $supplier = DB::table('supplier_table')->orderBy('supplier_id')->get();
        return view('admin.material.add_material')->with('supplier', $supplier);

    }
    public function all_material(){
        $this->AuthLogin();
        $all_material = DB::table('material_table')->join('supplier_table', 'supplier_table.supplier_id', 'material_table.supplier_id')
        ->orderByDesc('material_table.material_id')->paginate(10);
        return view('admin.material.all_material', ['all_material' => $all_material]);
    }    
    public function save_material(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['material_name'] = $request->material_name;
        $data['supplier_id'] = $request->supplier;
        $data['material_price'] = $request->material_price;
        $data['material_number'] = $request->material_number;
        $data['material_stt'] = $request->material_stt;
        $data['material_unit'] = $request->material_unit;
        $data['material_decs'] = $request->material_decs;
        $get_image = $request->file('material_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/images/material',$new_image);
            $data['material_image'] = $new_image;
            DB::table('material_table')->insert($data);
            Session()->put('message','Thêm nguyên liệu thành công');
            return redirect::to('all-material');
        }
        $data['material_image'] = '';
        DB::table('material_table')->insert($data);
        Session()->put('message','Thêm nguyên liệu thành công');
        return redirect::to('all-material');
        
    }
    public function edit_material($material_id){
        $this->AuthLogin();
        $supplier = DB::table('supplier_table')->get();
        $all_material = DB::table('material_table')->where('material_id', $material_id)->get();
        return view('admin.material.edit_material', ['all_material' => $all_material, 'supplier' => $supplier]);
    }
    public function update_material(Request $request, $material_id){
        $this->AuthLogin();
        $data = array();
        $data['material_name'] = $request->material_name;
        $data['supplier_id'] = $request->supplier;
        $data['material_price'] = $request->material_price;
        $data['material_number'] = $request->material_number;
        $data['material_stt'] = $request->material_stt;
        $data['material_unit'] = $request->material_unit;
        $data['material_decs'] = $request->material_decs;
        $get_image = $request->file('material_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/images/material',$new_image);
            $data['material_image'] = $new_image;
            DB::table('material_table')->where('material_id',$material_id)->update($data);
            Session()->put('message','Sửa nguyên liệu thành công');
            return redirect::to('all-material');
        }
        DB::table('material_table')->where('material_id',$material_id)->update($data);
        Session()->put('message','Sửa nguyên liệu thành công');
        return redirect::to('all-material');
    }
    public function delete_material($material_id){
        $this->AuthLogin();
        DB::table('material_table')->where('material_id', $material_id)->delete();
        Session()->put('message','Xóa nguyên liệu thành công');
        return redirect::to('all-material');
    }
    public function on_material($material_id){
        $this->AuthLogin();
        DB::table('material_table')->where('material_id', $material_id)->update(['material_stt'=> 0]);
        Session()->put('message','Kích hoạt nguyên liệu');
        return redirect::to('all-material');
    }
    public function off_material($material_id){
        $this->AuthLogin();
        DB::table('material_table')->where('material_id', $material_id)->update(['material_stt'=> 1]);
        Session()->put('message','Dừng bán nguyên liệu');
        return redirect::to('all-material');
    }
    public function turnover_material(){
        $productQuantities = DB::table('material_table')
        ->select('material_name','material_unit', DB::raw('SUM(material_number) as total_quantity'))
        ->groupBy('material_name','material_unit')
        ->get();

    // Trả về view và truyền dữ liệu sản phẩm cho view
    return view('admin.system.turnover_material', ['productQuantities' => $productQuantities]);
    }
}
