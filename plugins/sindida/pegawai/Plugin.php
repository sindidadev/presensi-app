<?php

namespace Sindida\Pegawai;

use Backend\Facades\Backend;
use Backend\Models\UserRole;
use System\Classes\PluginBase;

/**
 * Pegawai Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'sindida.pegawai::lang.plugin.name',
            'description' => 'sindida.pegawai::lang.plugin.description',
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
   public function registerComponents()
{
    return [
        'Sindida\Pegawai\Components\LoginPegawai' => 'loginPegawai'
    ];
}


    /**
     * Registers any backend permissions used by this plugin.
     */
    public function registerPermissions(): array
{
    return [
        'sindida.pegawai.access_pegawai' => [
            'tab'   => 'Pegawai',
            'label' => 'Akses manajemen pegawai',
        ],
    ];
}


    /**
     * Registers backend navigation items for this plugin.
     */
    public function registerNavigation(): array
{
    return [
        'pegawai' => [
            'label'       => 'Pegawai',
            'url'         => \Backend::url('sindida/pegawai/pegawais'),
            'icon'        => 'icon-user',
            'permissions' => ['sindida.pegawai.*'],
            'order'       => 500,
        ],
    ];
}

}
