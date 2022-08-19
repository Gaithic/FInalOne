<?php namespace Netgen\Extenduser\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use Session;
Use Redirect;
use Input;
use RainLab\User\Facades\Auth;
use RainLab\User\Models\User;

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
        try {
                $mobile = $request->mobile;
                $user = Auth::attempt([
                    'login' => $mobile,
                    'password' => Hash::make('Netgen@123'),
                ]);
                return sprintf('welcome %s!!!', $mobile);
            }
            catch (\Winter\Storm\Auth\AuthException $e) {
                return sprintf('Invalid credentials!');
            }
    }
}
