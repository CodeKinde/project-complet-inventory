<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function CustomerView(){
        $data['customers'] = Customer::latest()->get();
        return view('backend.customer.customer_view',$data);
    }

    public function CustomerAdd(){
        return view('backend.customer.customer_add');
    }
    public function CustomerStore(Request $request){
        $data = new Customer();
        $data->nom = $request->nom;
        $data->prenom = $request->prenom;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->created_by = Auth::user()->id;
        $data->created_at = Carbon::now();
        $data->save();
        $notification = array(
            'message' => 'Client Enrégistré  avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function CustomerEdit($id){
        $data['customer'] = Customer:: find($id);
        return view('backend.customer.customer_edit',$data);
    }
    public function CustomerUpdate(Request $request,$id){
        $data = Customer::find($id);
        $data->nom = $request->nom;
        $data->prenom = $request->prenom;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->updated_by = Auth::user()->id;
        $data->updated_at = Carbon::now();
        $data->save();
        $notification = array(
            'message' => 'Client mise à jour  avec succès!',
            'alert-type' => 'info'
        );
        return redirect()->route('customer.view')->with($notification);
    }
    public function CustomerDelete($id){
        $data = Customer::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Client supprimé  avec succès!',
            'alert-type' => 'info'
        );
        return redirect()->route('customer.view')->with($notification);
    }
}
