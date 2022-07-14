<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function UnitView(){
        $data['units'] = Unit::latest()->get();
        return view('backend.unit.unit_view',$data);
    }

    public function UnitAdd(){
        return view('backend.unit.unit_add');
    }
    public function UnitStore(Request $request){
        $data = new Unit();
        $data->name = $request->name;
        $data->created_by = Auth::user()->id;
        $data->created_at = Carbon::now();
        $data->save();
        $notification = array(
            'message' => 'Unité Enrégistré  avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function UnitEdit($id){
        $data['unit'] = Unit:: find($id);
        return view('backend.unit.unit_edit',$data);
    }
    public function UnitUpdate(Request $request,$id){
        $data = Unit::find($id);
        $data->name = $request->name;
        $data->updated_by = Auth::user()->id;
        $data->updated_at = Carbon::now();
        $data->save();
        $notification = array(
            'message' => 'Unité mise à jour  avec succès!',
            'alert-type' => 'info'
        );
        return redirect()->route('unit.view')->with($notification);
    }
    public function UnitDelete($id){
        $data = Unit::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Unit supprimé  avec succès!',
            'alert-type' => 'info'
        );
        return redirect()->route('unit.view')->with($notification);
    }

}
