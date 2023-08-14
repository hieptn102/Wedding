<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class SupplierController extends Controller
{
    public function SupplierAll(){
        $suppliers = Supplier::all();
        //$suppliers = Supplier::latest()->get();
        return view('backend.supplier.supplier_all',compact('suppliers'));
    }

    public function SupplierAdd(){
        return view('backend.supplier.supplier_add');
    }

    public function SupplierStore(Request $request){
        Supplier::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Đã thêm mới nhà cung cấp thành công',
            'alert-type' => 'success',
        );
        return redirect()->route('supplier.all')->with($notification);
    }

    public function SupplierEdit($id){
        $supplier = Supplier::findOrFail($id);
        return view('backend.supplier.supplier_edit',compact('supplier'));
    } // End Method 

    public function SupplierUpdate(Request $request){
        $sullier_id = $request->id;
        Supplier::findOrFail($sullier_id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'update_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 
        ]);
         $notification = array(
            'message' => 'Cập nhật thông tin thành công', 
            'alert-type' => 'success'
        );
        return redirect()->route('supplier.all')->with($notification);
    } // End Method 

    public function SupplierDelete($id){
      Supplier::findOrFail($id)->delete();
       $notification = array(
            'message' => 'Đã xóa nhà cung cấp', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method 
}
