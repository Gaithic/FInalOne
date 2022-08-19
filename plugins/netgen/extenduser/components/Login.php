<?php namespace Netgen\Extenduser\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Session;
Use Redirect;
use Input;
use Auth;
use RainLab\User\Models\User;
use DB;

class Login extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'login Component',
            'description' => 'No description provided yet...'
        ];
    }

    // public function defineProperties()
    // {
    //     return [];
    // }

    // public function customLogin(Request $request)
    // {

    //     $mobile = $request->mobile;
    //     $otp = $request->otp;


    //     // $request->validate([
    //     //     'email' => 'required',
    //     //     'password' => 'required',
    //     // ]);

    //     $credentials = $request->only($mobile, $otp);
    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('dashboard')
    //                     ->withSuccess('Signed in');
    //     }

    //     return redirect("login")->withSuccess('Login details are not valid');
    // }

    // public function logout() {
    //   Auth::logout();

    //   return redirect('user-login');
    // }

    public function customLogin(Request $request){
        $loggedIn = Auth::check();
        $user = Auth::getUser();
        $user = Auth::authenticate([
            'login' => post('login'),
            'password' => post('password')
        ], true);
        Auth::login($user, true);
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('home');
        // }

        // return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function generateLoginOTP(Request $request){
        $mobile = $request->mobile;
        $data = 45678;
        $password = 'Netgen@123';
        $add = DB::table('users')
              ->where('mobile', $mobile)
              ->update(['password' => $password]);

        $credentials = $request->only('mobile', 'password');
        $user = \RainLab\User\Models\User::whereMobile($mobile)->first();
        $res = Auth::loginUsingId($user);
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }

        return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
        // return response()->json([
        //     'add' => $add,
        // ]);
    }
}
