<?php

namespace Sindida\Presensi;

use Backend\Facades\Backend;
use Backend\Models\UserRole;
use System\Classes\PluginBase;

/**
 * Presensi Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'sindida.presensi::lang.plugin.name',
            'description' => 'sindida.presensi::lang.plugin.description',
            'author'      => 'Sindida',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     */
    public function register(): void
    {

    }

    /**
     * Boot method, called right before the request route.
     */
    public function boot(): void
    {

    }

    /**
     * Registers any frontend components implemented in this plugin.
     */
    public function registerComponents(): array
{
    return [
        \Sindida\Presensi\Components\PresensiForm::class => 'presensiForm',
    ];
}


    /**
     * Registers any backend permissions used by this plugin.
     */
    public function registerPermissions(): array
{
    return [
        'sindida.presensi.access' => [
            'tab' => 'Presensi',
            'label' => 'Access presensi plugin'
        ],
    ];
}

    /**
     * Registers backend navigation items for this plugin.
     */
    public function registerNavigation(): array
{
    return [
        'presensi' => [
            'label'       => 'Presensi',
            'url'         => Backend::url('sindida/presensi/presensis'),
            'icon'        => 'icon-clock-o',
            'permissions' => [],
            'order'       => 510,
        ],
    ];
}

}
