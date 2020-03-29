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
        static::updateScripts();
        static::updateStyles();
        static::updateViews();
        static::updateRoutes();
    }

    /**
     * Updates the scripts files
     * @return void
     */
    public static function updateScripts()
    {
        $stub = __DIR__.'/stubs/frontend/resources/js';
        $path = resource_path('js');
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the style (sass) files
     * @return void
     */
    public static function updateStyles()
    {
        $stub = __DIR__.'/stubs/frontend/resources/sass';
        $path = resource_path('sass');
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the views files
     * @return void
     */
    public static function updateViews()
    {
        $stub = __DIR__.'/stubs/frontend/resources/views';
        $path = resource_path('views');
        (new Filesystem)->copyDirectory($stub, $path);
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
