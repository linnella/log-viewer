<?php

namespace Core\Admin\LogViewer;

use Illuminate\Support\ServiceProvider;

class LogViewerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin-logs');

        LogViewer::boot();
    }
}
