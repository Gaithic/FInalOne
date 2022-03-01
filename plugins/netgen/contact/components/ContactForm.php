<?php namespace Netgen\Contact\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Input;
use Mail;
use Netgen\Scert\Models\GlobalSetting;
use Winter\Storm\Exception\ValidationException;

class ContactForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'=>"Contact Form",
            'description'=> 'Simple contact form'
        ];
    }

    public function onSend(){

        $data = post();
        $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'subject' =>'required|min:2',
                'content' => 'required|min:10',
                'captcha' => 'required|captcha_api:'. Session::get('captcha.key')
            ];

        $validator = Validator::make($data, $rules);
        
        if($validator->fails()){
            throw new ValidationException($validator);
        }else{
            $vars = [
                'name' => Input::get('name'), 
                'email' => Input::get('email'),
                'subject'=> Input::get('subject'),
                'content'=> Input::get('content'),    
            ];
            Mail::send('netgen.contact::mail.message', $vars, function($message) {

                $contactEmail = GlobalSetting::select('contact_email')->first();
                $message->to($contactEmail->contact_email, 'Admin Person');
                $message->subject('New message from contact form SCERT');

            });
        }
        
    }


}
