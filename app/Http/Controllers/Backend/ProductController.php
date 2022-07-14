<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function ProductView(){
        $data['products'] = Product::latest()->get();
        return view('backend.product.product_view',$data);
    }
    public function ProductAdd(){
        $data['suppliers'] = Supplier::latest()->get();
        $data['units'] = Unit::latest()->get();
        $data['categories'] = Category::latest()->get();

        return view('backend.product.product_add',$data);
    }
    public function ProductStore(Request $request){
        $data = new Product();
        $data->name = $request->name;
        $data->supplier_id = $request->supplier_id;
        $data->unit_id = $request->unit_id;
        $data->category_id = $request->category_id;
        $data->quantity = '0';
        $data->created_by = Auth::user()->id;
        $data->created_at = Carbon::now();
        $data->save();
        $notification = array(
            'message' => 'Produit Enrégistré  avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function ProductEdit($id){
        $data['product'] = Product:: find($id);
        $data['suppliers'] = Supplier::latest()->get();
        $data['units'] = Unit::latest()->get();
        $data['categories'] = Category::latest()->get();

        return view('backend.product.product_edit',$data);
    }
    public function ProductUpdate(Request $request, $id){
        $data = Product:: find($id);
        $data->name = $request->name;
        $data->supplier_id = $request->supplier_id;
        $data->unit_id = $request->unit_id;
        $data->category_id = $request->category_id;
        $data->quantity = '0';
        $data->updated_by = Auth::user()->id;
        $data->updated_at = Carbon::now();
        $data->save();
        $notification = array(
            'message' => 'Prouit mise à jour  avec succès!',
            'alert-type' => 'info'
        );
        return redirect()->route('product.view')->with($notification);
    }
    public function ProductDelete($id){
        $data = Product::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Produit supprimé  avec succès!',
            'alert-type' => 'info'
        );
        return redirect()->route('product.view')->with($notification);
    }
}
