<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginForm()
    {
        if(Auth::check())
        {
            return redirect()->route('home');
        }
        else
        {            
            return view('backend.admin.login');
        }
    }
    public function signupForm()
    {
        if(Auth::check())
        {
            return redirect()->route('home');
        }
        else
        {
            return view('backend.admin.signup');
        }
    }
    public function login(Request $request)
    {
        dd('hfghfghfghfhg');

        $xabar = 'Email or password entered incorrectly';
        $this->validate($request, [
            'email' =>  'required|email',
            'password'  =>  'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        else
        {
            return view('backend.admin.login',compact('xabar'));
        }
        return redirect()->back();
    }
    
    public function signup(Request $request)
    {
        $request->validate([
            'name' =>  'required',
            'email'  => 'required',
            'password'  => 'required',
        ]);
         // $to_name = $request->get('name');
         //    $to_email = $request->get('email');
         //    $data = array('name' => $to_name, 'body' => 'keldi');
         //    // dd($to_email);
         //    Mail::send('mail', $data, function($message) use ( $to_email) {
         //        $message->to($to_email)->subject('Laravel Test Mail');
         //        $message->from('xoliqovhamid@gmail.com','Test Mail');
         //    });
        User::create([
            'name' => $request->all()['name'],
            'email' => $request->all()['email'],
            'password' => Hash::make($request->all()['password']),
        ]);
            return redirect()->route('dashboard');
    }
    public function dashboard()
    {
        return view('backend.admin.dashboard');
    }
}
