<?php namespace Netgen\Examinations;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return
        [
            'Netgen\Examinations\Components\ExaminationForm' => 'examinationform',

        ];

    }

    public function registerSettings()
    {
    }
}
