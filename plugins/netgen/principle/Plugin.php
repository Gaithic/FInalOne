<?php namespace Netgen\Principle;

use Backend\Controllers\Users;
use Backend\Models\User;
use Netgen\Examinations\Models\School;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot()
    {
        User::extend(function($model){
            // $model->belongsTo['school'] = ['netgen\examinations\Models\School'];  
            $model->belongsTo['district'] = ['netgen\examinations\Models\District'];    
        });

         Users::extendFormFields(function($form, $model, $context){
                if (!$model instanceof User)
                return;
                $form->addTabFields([
                    'district' => [
                        'label'   => 'District Name',
                        'comment' => 'Select District',
                        'relation'=> 'district',
                        'select' => 'district',
                        'type' => 'relation', 
                        'placeholder' => 'Select District Name',
                        'trigger' => [
                            'action' => 'show',
                            'field' => 'role',
                            'condition' => 'value[3]',
                        ],
                    ],
                    'school' => [
                        'label'   => 'School Name',
                        'comment' => 'Associate this user with a School',
                        'type' => 'dropdown',
                        'dependsOn' => 'district',
                        'trigger' => [
                            'action' => 'show',
                            'field' => 'role',
                            'condition' => 'value[3]',
                        ],
                    ]
                ]);
           
                
          
        });
    }
}
