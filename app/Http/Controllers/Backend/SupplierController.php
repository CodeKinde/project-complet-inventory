<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function SupplierView(){
        $data['suppliers'] = Supplier::latest()->get();
        return view('backend.supplier.supplier_view',$data);
    }

    public function SupplierAdd(){
        return view('backend.supplier.supplier_add');
    }
    public function SupplierStore(Request $request){
        $data = new Supplier();
        $data->nom = $request->nom;
        $data->prenom = $request->prenom;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->created_by = Auth::user()->id;
        $data->created_at = Carbon::now();
        $data->save();
        $notification = array(
            'message' => 'fournisseur inséré  avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function SupplierEdit($id){
        $data['supplier'] =Supplier:: find($id);
        return view('backend.supplier.supplier_edit',$data);
    }
    public function SupplierUpdate(Request $request, $id){
        $data = Supplier::find($id);
        $data->nom = $request->nom;
        $data->prenom = $request->prenom;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->updated_by = Auth::user()->id;
        $data->updated_at = Carbon::now();
        $data->save();
        $notification = array(
            'message' => 'fournisseur mise à jour  avec succès!',
            'alert-type' => 'info'
        );
        return redirect()->route('supplier.view')->with($notification);
    }
    public function SupplierDelete($id){
        $data = Supplier::find($id);
        $data->delete();
        $notification = array(
            'message' => 'fournisseur supprimé  avec succès!',
            'alert-type' => 'info'
        );
        return redirect()->route('supplier.view')->with($notification);
    }
}
