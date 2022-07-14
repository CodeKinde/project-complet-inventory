<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

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
}
