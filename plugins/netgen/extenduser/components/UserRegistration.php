<?php namespace Netgen\Extenduser\Components;

use Cms\Classes\ComponentBase;
use Input;
use validator;
use Redirect;
use Rainlab\User\Models\User;
use Illuminate\Http\Request;
use DB;
use Hash;
class UserRegistration extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'UserRegistration Component',
            'description' => 'No description provided yet...'
        ];
    }


    public function onSave(Request $request)
    {
        // $user = new User();
        // $user->name = $request->name;
        // $user->fathername = $request->fathername;
        // $user->mothername = $request->mothername;
        // $user->contact = $request->mobile;
        // $user->name = $request->gender;
        // $user->name = $request->email;
        // $user->save();

        $name = $request->name;
        $fathername = $request->fathername;
        $mothername = $request->mothername;
        $mobile = $request->mobile;
        $gender = $request->gender;
        $email = $request->email;
        $activated = 1;
        $academic = date('Y');
        $academic_year = DB::table('users')->whereEmail($email)->value('academic_year');
        $phoneNumber = DB::table('users')->whereMobile($mobile)->value('academic_year');
        $activated_at =  date('Y-m-d H:i:s');
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
    }




}
