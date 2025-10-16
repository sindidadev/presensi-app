<?php

namespace Sindida\Pegawai\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;

class Pegawais extends Controller
{
    /**
     * Implement Form & List behaviors
     */
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    protected $requiredPermissions = [
        'sindida.pegawai.access_pegawai',
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Sindida.Pegawai', 'pegawai', 'pegawais');
    }
}
