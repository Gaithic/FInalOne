<?php namespace Netgen\Contact\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Input;
use Mail;
use Netgen\Contact\Models\ContactForm as ModelsContactForm;
use Netgen\Scert\Models\GlobalSetting;
use Winter\Storm\Exception\ValidationException;
use Winter\Storm\Support\Facades\Flash;
use Winter\Storm\Support\Facades\Validator;

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

        $messages = [
            'captcha.captcha' => 'Wrong Captcha, Try Again !'
        ];

        $validator = Validator::make($data, $rules, $messages);
        
        if($validator->fails()){
            throw new ValidationException($validator);
        }else{

            $contact = new ModelsContactForm();
            $contact->name = Input::get('name');
            $contact->email = Input::get('email');
            $contact->subject = Input::get('subject');
            $contact->content = Input::get('content');
            $contact->save();

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
                Flash::success('Contact form has been submitted!');
            });
        }
        
    }


}
