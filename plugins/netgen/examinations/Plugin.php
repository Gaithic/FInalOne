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

    public function registerPDFTemplates()
    {
        return [
            'netgen.examinations::pdf.admitCard',
        ];
    }

    public function registerPDFLayouts()
    {
        return [
            'netgen.examinations::pdf.layouts.default',
        ];
    }


}
