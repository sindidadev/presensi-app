<?php

namespace Sindida\Presensi\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;

/**
 * Presensis Backend Controller
 */
class Presensis extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    /**
     * @var array Permissions required to view this page.
     */
    protected $requiredPermissions = [
        'sindida.presensi.presensis.manage_all',
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Sindida.Presensi', 'presensi', 'presensis');
    }
}
