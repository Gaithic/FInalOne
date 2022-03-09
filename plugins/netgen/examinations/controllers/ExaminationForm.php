<?php namespace Netgen\Examinations\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendAuth;
use BackendMenu;
use Netgen\Examinations\Models\ExamForm;
use Renatio\DynamicPDF\Classes\PDF;

class ExaminationForm extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Netgen.Examinations', 'main-menu-item', 'side-menu-item3');
    }

    /**
     * 
     * @return list of student belongs to specific principles
     * 
     */
    public function listExtendQuery($query, $definition)
    {
        $user = BackendAuth::getUser();
        if($user->id != "1"){
            $query->where('school_id', $user->school_id);
        }
    }

   

  


    

 




}
