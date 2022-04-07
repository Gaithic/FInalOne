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
            $model->belongsTo['school'] = ['netgen\examinations\Models\School'];  
            $model->belongsTo['district'] = ['netgen\examinations\Models\District'];            
            $model->bindEvent('model.getSchoolOptions', function ($attribute, $value) {
                return School::where('district_id',$attribute->id)->pluck('name','id');
            });
        });

         Users::extendFormFields(function($form, $model, $context){
                if (!$model instanceof User)
                return;

                $form->addTabFields([
                    'district' => [
                        'label'   => 'District Name',
                        'comment' => 'Select District',
                        'list' => '$/netgen/examinations/models/District/columns.yaml',
                        'relation'=> 'district',
                        'select' => 'district',
                        'type' => 'relation',      
                    ],
                    'school' => [
                        'label'   => 'School Name',
                        'comment' => 'Associate this user with a School',
                        'type' => 'dropdown',
                        'dependsOn' => 'district',

                    ]
                ]);
          
        });
    }
}
