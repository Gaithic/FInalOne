<?php 
namespace Netgen\Examinations\Classes;

use Backend\Classes\Controller;
use Backend\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Netgen\Examinations\Models\ExamForm;
use Netgen\Examinations\Models\ExaminationType;
use Netgen\Examinations\Models\School;
use Renatio\DynamicPDF\Classes\PDF;
use Mail;

class ExaminationFormController extends Controller{
    /**
     * 
     * store admit card
     * 
     */
    public function formAfterUpdate(ExamForm $model){
        if($model->is_approved == 1){
            $templateCode = 'netgen.examinations::pdf.admitCard'; 
            $school = School::where('id',$model->school_id)->first();
            $examType = ExaminationType::where('id',$model->examination_id)->first();
            $randRollnumber = $this->getName(5);
            $data = [
                    'name' => $model->name,
                    'gender' => $model->sex,
                    'enrollmentNumber' => $model->roll_number.$randRollnumber,
                    'schoolName' => $school->name,
                    'examType' => $examType->name,
                    'fatherName' => $model->father_name
                ];
            PDF::loadTemplate($templateCode,$data)->save('storage/app/form/'.$model->school_id.'_'.$model->roll_number.'.pdf');

            Mail::send('netgen.examinations::mail.message', $vars, function($message) {

                $studentEmail = User::select('email',)->first();
                $message->to($studentEmail->email, 'Admit Card');
                $message->subject('New message from contact form SCERT');
                Flash::success('Contact form has been submitted!');
            });
        }
        
    }

    /**
     * 
     * generate random roll number
     */
    public function getName($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
      
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
      
        return $randomString;
    }
}