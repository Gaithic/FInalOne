<?php namespace Netgen\Scert\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class GlobalSetting extends Controller
{
    public $implement = [        'Backend\Behaviors\FormController'    ];
    
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Netgen.Scert', 'main-menu-item');
    }
}
