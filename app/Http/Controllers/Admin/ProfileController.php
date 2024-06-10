<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update_password(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required',
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
            'new_password_confirmation' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            Session::flash('message', 'Current password does not match!');
            Session::flash('alert-class', 'alert-danger');
            return redirect('admin/profile-settings');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        Session::flash('message', 'Password changed successfully!');
        Session::flash('alert-class', 'alert-info');
        return redirect('admin/profile-settings');
    }
}
