<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function CategoryView(){
        $data['category'] = Category::latest()->get();
        return view('backend.category.category_view',$data);
    }
    public function CategoryAdd(){
        return view('backend.category.category_add');
    }
    public function CategoryStore(Request $request){
        $data = new Category();
        $data->name = $request->name;
        $data->created_by = Auth::user()->id;
        $data->created_at = Carbon::now();
        $data->save();
        $notification = array(
            'message' => 'Categories Enrégistré  avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function CategoryEdit($id){
        $data['category'] = Category:: find($id);
        return view('backend.category.category_edit',$data);
    }
    public function CategoryUpdate(Request $request,$id){
        $data = Category::find($id);
        $data->name = $request->name;
        $data->updated_by = Auth::user()->id;
        $data->updated_at = Carbon::now();
        $data->save();
        $notification = array(
            'message' => 'Catgeorie mise à jour  avec succès!',
            'alert-type' => 'info'
        );
        return redirect()->route('category.view')->with($notification);
    }
    public function CategoryDelete($id){
        $data = Category::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Category supprimé  avec succès!',
            'alert-type' => 'info'
        );
        return redirect()->route('category.view')->with($notification);
    }
}
