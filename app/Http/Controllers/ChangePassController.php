<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangePassController extends Controller
{
    public function AdminPass(){
        return view('admin.body.updatePass');
    }

    public function AdminPassStore(Request $request){
        $request->validate([
            'oldPassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $changePass = Auth::User()->password;

        if(Hash::check($request->oldPassword, $changePass)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('login')->with('success', 'Password Changed Successfuly!');
        }else{
            return redirect()->back()->with('error', 'Current Password is Invalid!');
        }
    }
}
 