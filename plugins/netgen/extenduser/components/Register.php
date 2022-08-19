<?php namespace Netgen\Extenduser\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RainLab\User\Facades\Auth;
use RainLab\User\Models\User;
use Redirect;
use Input;
class Register extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Register Component',
            'description' => 'No description provided yet...'
        ];
    }

    // public function defineProperties()
    // {
    //     return [];
    // }

    public function userRegisteUser(Request $request)
    {

        $rules = [
            'name' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:users'
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

            $mobile = $request->mobile;
            $user = User::whereMobile($mobile)->first();
            $email = $request->email;
            $name = $request->name;
            $fathername = $request->fathername;
            $mothername = $request->mothername;
            $gender = $request->gender;
            $activated = 1;
            $success = "Form Submitted Successfuly..";
            $error = "OOps Something Went Wrong...";
            $academic = date('Y');
            $check = "Email is Already Exist, Kindly login and try next year for registration with the new Acadamic Scholarship Year..";
            $phoneError = "Phone is Already Exist, Kindly login and try next year for registration with the new Acadamic Scholarship Year..";
            $academic_year = DB::table('users')->whereEmail($email)->value('academic_year');
            $phoneNumber = DB::table('users')->whereMobile($mobile)->value('academic_year');
            $activated_at =  date('Y-m-d H:i:s');
            if($academic_year == $academic){
                return response()->json([
                    'check' => $check,
                    'success' 	=> 'emailError',
                    'phoneNumber' =>  $phoneNumber,
                ]);
            }else{
                if($phoneNumber == $academic ){
                    return response()->json([
                        'phoneError' => $phoneError,
                        'success' 	=> 'phoneError',
                        'phoneNumber' =>  $phoneNumber,
                    ]);
                }else{
                    $inserUserData = DB::table('users')->insert([
                        'email'=> $email,
                        'password' => Hash::make('Netgen@123'),
                        'contact' => $mobile,
                        'mobile' => $mobile,
                        'name' => $name,
                        'fathername' => $fathername,
                        'mothername' => $mothername,
                        'gender' => $gender,
                        'academic_year' => $academic,
                        'is_activated' => $activated,
                        'activated_at' => $activated_at,
                        'created_at' => $activated_at
                    ]);
                    if($inserUserData){
                        return response()->json([
                            'success' => $success,
                            'user'      => Auth::getUser(),

                        ]);
                    }else{
                        return response()->json([
                            'error' => $error,
                            'inserUserData' => $inserUserData,
                            'user'      => $user,
                        ]);
                    }
                }
            }
    }

}
