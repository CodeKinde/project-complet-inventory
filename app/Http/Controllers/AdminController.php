<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function ProfileView(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.user.profile_view',compact('user'));
    }
    public function ProfileEdit(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.user.profile_edit',compact('user'));
    }

    public function ProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        if ($request->file('profile_photo')) {
            $file = $request->file('profile_photo');
            unlink(public_path('upload/user_photo/'.$data->profile_photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_photo'),$filename);
            $data['profile_photo'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'profile user modifier avec succès!',
            'alert-type' => 'info'
        );
        return redirect()->route('profile.view')->with($notification);
    }
    public function ChangePassword(){
        return view('admin.user.change_password');
    }
    public function UpdateChangePassword(Request $request){
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)){
            $data = User:: find(Auth::id());
            $data->password = bcrypt($request->newpassword);
            $data->save();
            session()->flash('message','Mot de passe mise à jour');
            Auth::logout();
            return redirect()->route('login');
        }else{
            session()->flash("message","L'ancien mot de passe ne correspond pas!");
            return redirect()->back();
        }
    }
}
