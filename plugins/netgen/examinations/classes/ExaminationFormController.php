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
use Winter\Storm\Support\Facades\Flash;

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

            $path = 'storage/app/form/'.$model->school_id.'_'.$model->roll_number.'.pdf';
            PDF::loadTemplate($templateCode,$data)->save($path);

            $vars = [
                'name' => $model->name,   
            ];
            Mail::send('netgen.examinations::mail.message', $vars, function($message) use($model,$path){
                $message->to($model->email, 'Admit Card');
                $message->subject('SCERT Solan Admit Card');
                $message->attach($path);
                Flash::success('Admit card send to student!');
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

    /**
     * @return schoolname
     * 
     */
    public function school(Request $request){
        $districtID = $request->districtID;
        $school = School::where('district_id',$districtID)->get();
        if($school->count() > 0){
            $html = '<option value="">Select School</option>';
            foreach($school as $list){
                $html .='<option value="'.$list->id.'">'.$list->name.'</option>';
            }
            echo $html;
        }
        else{
            $html = '<option value="">There is no school</option>';
            echo $html;
        }
    }
}