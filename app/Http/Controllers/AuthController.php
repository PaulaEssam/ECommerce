<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

// use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        if(!empty(Auth::check() && Auth::user()->is_admin==1)){
            return redirect('admin/dashboard');
        }
        return view('admin.auth.login');
    }
    public function admin_login(Request $request)
    {
        $remember = !empty($request->remember) ? true : false ;
        if (Auth::attempt(['email' => $request->email , 'password' => $request->password , 'is_admin'=>1 , 'status'=>0 , 'is_deleted' => 0], $remember)) {
                return redirect('admin/dashboard'); //**** status = 0 means is active ****
        } else {
                return redirect()->back()->with('error', 'Invalid email or password');
        }
    }
    public function admin_logout()
    {
        Auth::logout();
        return redirect(url('admin'));
    }
    public function user_logout()
    {
        Auth::logout();
        return redirect(url(''));
    }

    public function auth_login(Request $request)
    {
        $remember = !empty($request->remember) ? true : false ;

        if (Auth::attempt(['email' => $request->email , 'password' => $request->password , 'is_admin'=>0 , 'status'=>0 , 'is_deleted' => 0], $remember)) {
            $json['status'] = true ;
            $json['message'] = "succefully login";
        }
        else {
            $json['status'] = false ;
            $json['message'] = "Invalid email or password";
        }
        echo json_encode($json) ;
    }

    public function auth_register(Request $request)
    {
        $getUserEmail = User::where('email', $request->email)->first();
        if(empty($getUserEmail)){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->is_admin = 0;
            $user->status = 0;
            $user->is_deleted = 0;
            $user->save();

            Mail::to($user->email)->send(new RegisterMail($user));
            $json['status'] = true ;
            $json['message'] = 'Your account created successfully';
        }
        else{
            $json['status'] = false;
            $json['message'] = 'Email already exists';
        }
        echo json_encode($json);
    }

}
