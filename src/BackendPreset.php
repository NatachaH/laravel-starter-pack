<?php

namespace Nh\StarterPack;

use Laravel\Ui\Presets\Preset;
use Illuminate\Filesystem\Filesystem;

class BackendPreset extends Preset
{
    /**
     * Install the preset
     * @return void
     */
    public static function install()
    {
        static::updateScripts();
        static::updateTranslations();
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
        $stub = __DIR__.'/stubs/backend/resources/js';
        $path = resource_path('js');
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the translations files
     * @return void
     */
    public static function updateTranslations()
    {
        $stub = __DIR__.'/stubs/backend/resources/lang';
        $path = resource_path('lang');
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the style (sass) files
     * @return void
     */
    public static function updateStyles()
    {
        $stub = __DIR__.'/stubs/backend/resources/sass';
        $path = resource_path('sass');
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the views files
     * @return void
     */
    public static function updateViews()
    {
        $stub = __DIR__.'/stubs/backend/resources/views';
        $path = resource_path('views');
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the routes files
     * @return void
     */
    public static function updateRoutes()
    {
        $stub = __DIR__.'/stubs/backend/routes';
        $path = base_path('routes');
        (new Filesystem)->copyDirectory($stub, $path);
    }

}
