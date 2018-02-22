<?php

namespace Core\Admin\LogViewer;

use Core\Admin\Admin;

trait BootExtension
{
    /**
     * {@inheritdoc}
     */
    public static function boot()
    {
        static::registerRoutes();

        Admin::extend('log-viewer', __CLASS__);
    }

    /**
     * Register routes for laravel-admin.
     *
     * @return void
     */
    protected static function registerRoutes()
    {
        parent::routes(function ($router) {
            /* @var \Illuminate\Routing\Router $router */
            $router->get('logs', 'Core\Admin\LogViewer\LogController@index')->name('log-viewer-index');
            $router->get('logs/{file}', 'Core\Admin\LogViewer\LogController@index')->name('log-viewer-file');
            $router->get('logs/{file}/tail', 'Core\Admin\LogViewer\LogController@tail')->name('log-viewer-tail');
        });
    }

    /**
     * {@inheritdoc}
     */
    public static function import()
    {
        parent::createMenu('Log viwer', 'logs', 'fa-database', 2);

        parent::createPermission('Logs', 'ext.log-viewer', 'logs*');
    }
}
