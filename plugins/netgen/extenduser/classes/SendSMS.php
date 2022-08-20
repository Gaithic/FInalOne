<?php
namespace Netgen\Extendu;
 
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Craftsys\Msg91\Facade\Msg91;
use Illuminate\Support\Facades\DB;

  
class SendSMS {

    /*******************************************************************
     * 
     * Send SMS.
     * phone number,sms
     */
    public function sendSms($data) {
		$response = [
			'sms' 		=> NULL,
			'success' 	=> false,
			'msg' 		=> 'Sorry sms could not be sent. Please try again.',
		];
		
		if($data['phone_number'] != null) {
			try {
				 #Msg91::sms()->to('91'.$data['phone_number'])->template('610ce681d2d6ea56e902ba52')->send();
				# sms gateway api code will go here
				$response = [
					'sms' 		=> $data['sms'],
					'phone_number' => $data['phone_number'],
					'msg'  		=> true,
					'success' 	=> true,
				];
							
			} catch (\Exception $e) {
				$response = [
					'phone_number' => $data['phone_number'],
					'sms' 		   => $data['sms'],
					'msg' 		   => $e->getMessage(),
					'success' 	   => false,
				];
			}
		}
		
		return $response;
    }
    
    /*******************************************************************
     * 
     * Send OTP.
     * phone number,otp
     */
    public function sendOtp($data) {
		$response = [
			'success' 	=> false,
			'msg' 		=> 'Sorry sms could not be sent. Please try again.',
		];
		
		
		try {
			
			
			
			if($data['formType']=="complaintForm"){
				$msg = Msg91::otp()->to('91'.$data['phone_number']) ->template(''.$_ENV['Msg91_Complaint_OTP_Template_id'].'')->send();
				# sms gateway api code will go here
				$response = [
					'phone_number' => $data['phone_number'],
					'msg'  		=> $msg,
					'success' 	=> true,
				];
			}elseif($data['formType']=="grevianceForm"){
				$msg = Msg91::otp()->to('91'.$data['phone_number']) ->template(''.$_ENV['Msg91_Complaint_OTP_Template_id'].'')->send();
				# sms gateway api code will go here
				$response = [
					'phone_number' => $data['phone_number'],
					'msg'  		=> $msg,
					'success' 	=> true,
				];
			}else{
				$msg = Msg91::otp()->to('91'.$data['phone_number']) ->template(''.$_ENV['Msg91_Login_OTP_Template_id'].'')->send();
				# sms gateway api code will go here
				$response = [
					'phone_number' => $data['phone_number'],
					'msg'  		=> $msg,
					'success' 	=> true,
				];
			}
			
			
			
		
		} catch (\Exception $e) {
			$response = [
				'phone_number' => $data['phone_number'],
				'msg' 		   => $e->getMessage(),
				'success' 	   => false,
			];
		}
		return [
			'success' 	=> true,
			'msg' 		=> 'Please enter the otp sent to your mobile number.',
		];
		//~ return $response;
    }
    
    /*******************************************************************
     * Verify OTP.
     * phone number, otp
     */
    public function verifyOtp($data) {
		$response = [
				'otp' 		=> NULL,
				'msg' 		=> 'Otp verification failed.',
				'success' 	=> false,
			];
		
		if($data['otp'] !== null) {
			# verify otp here
			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => 'https://api.msg91.com/api/v5/otp/verify?authkey='.$_ENV['Msg91_KEY'].'&mobile=91'.$data['phone_number'].'&otp='.$data['otp'].'',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
			));

			$res = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			$jsonObj = json_decode($res);
			if($jsonObj->type=="success"){
				
				$response = [
					'otp' 			=> $data['otp'],
					'phone_number' 	=> $data['phone_number'],
					'msg' 			=> 'Otp verified.',
					'success' 		=> true,
				];
				return [
					'success' 	=> true,
					'msg' 		=> 'Otp Verified.',
				];
			}else{
				$response = [
					'otp' 		=> NULL,
					'msg' 		=> 'Otp verification failed.',
					'success' 	=> false,
				];
				return [
					'success' 	=> false,
					'msg' 		=> 'Wrong OTP.',
				];
			}
			
		}
			
    }
}
