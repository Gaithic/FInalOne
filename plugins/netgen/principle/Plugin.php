<?php namespace Netgen\Principle;

use Backend\Controllers\Users;
use Backend\Models\User;
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

        });




         Users::extendFormFields(function($form, $model, $context){
                if (!$model instanceof User)
                return;

                $form->addTabFields([
                    'school' => [
                        'label'   => 'School Name',
                        'comment' => 'Associate this user with a School',
                        'list' => '$/netgen/examinations/models/School/columns.yaml',
                        'relation'=> 'school',
                        'select' => 'name',
                        'type' => 'relation',      
                    ]
                ]);
          
        });
    }
}
