<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function change_password()
    {
        $data['header_title'] = "Change Password";
        return view('profile.change_password', $data);
    }
    public function update_password(Request $request )
    {
        $change = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password, $change->password))
        {
            $change->password =Hash::make($request->new_password);
            $change->save();
            return redirect()->back()->with('success','Updated Successfuly');
        }
        else
        {
            return redirect()->back()->with('error' , 'Old Password Is not Curect');
        }
    }
}
