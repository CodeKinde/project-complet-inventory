<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function PurchaseView(){

        $data['purchases'] = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.purchase.purchase_view',$data);
    }
    public function PurchaseAdd(){
        $data['supplier'] = Supplier::all();
        $data['category'] = Category::all();
        $data['product'] = Product::all();
        return view('backend.purchase.purchase_add',$data);
    }
    public function PurchaseStore(Request $request){

        if($request->category_id == null){
            $notification = array(
                'message' => 'Désolé vous ne selectionnez aucun article!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else{
            $count_category =  count($request->category_id);
            for ($i=0; $i < $count_category; $i++) {
                $purchase = new Purchase();
                $purchase->date = date('Y-m-d',strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];

                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];

                $purchase->status = "0";
                $purchase->created_by = Auth::user()->id;
                $purchase->save();

            }//end foreach
        }//end if else
        $notification = array(
            'message' => 'Données Enregistrer avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->route('purchase.view')->with($notification);
    }//end method

    public function PurchaseDelete($id){
        $data = Purchase::find($id)->delete();
        $notification = array(
            'message' => 'Données supprimé avec succès!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function PurchasePending(){

        $data['purchases'] = Purchase::where('status',0)->orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.purchase.purchase_pending',$data);
    }
    public function PurchaseApprove($id){
        $purchase = Purchase::findOrFail($id);
        $product = Product::where('id',$purchase->product_id)->first();
        $purcharse_qty = ((float)($purchase->buying_qty))+((float)($product->quantity));
        $product->quantity = $purcharse_qty;

        if($product->save()){
            Purchase::findOrFail($id)->update([
                'status' => '1'
            ]);

            $notification = array(
                'message' => 'status approuvé avec succès!',
                'alert-type' => 'success'
            );
            return redirect()->route('purchase.view')->with($notification);
        }
    }
}
