<?php

namespace Nh\StarterPack;

use Laravel\Ui\Presets\Preset;
use Illuminate\Filesystem\Filesystem;

class FrontendPreset extends Preset
{
    /**
     * Install the preset
     * @return void
     */
    public static function install()
    {
        static::updateResources();
        static::updateRoutes();
    }

    /**
     * Updates the resources files
     * @return void
     */
    public static function updateResources()
    {
        $stub = __DIR__.'/stubs/frontend/resources/';
        (new Filesystem)->copyDirectory($stub.'js', resource_path('js'));
        (new Filesystem)->copyDirectory($stub.'sass', resource_path('sass'));
        (new Filesystem)->copyDirectory($stub.'views', resource_path('views'));
    }

    /**
     * Updates the routes files
     * @return void
     */
    public static function updateRoutes()
    {
        $stub = __DIR__.'/stubs/frontend/routes';
        $path = base_path('routes');
        (new Filesystem)->copyDirectory($stub, $path);
    }

}
