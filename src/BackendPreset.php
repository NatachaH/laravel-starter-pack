<?php

namespace Nh\StarterPack;

use Illuminate\Foundation\Console\Presets\Preset As LaravelPreset;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;

class BackendPreset extends LaravelPreset
{
    /**
     * Path of the resources folder
     * @var string
     */
    public $resources = __DIR__.'/stubs/backend/resources/';

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
        $path = resource_path('js');
        (new Filesystem)->copyDirectory($this->resources.'js', $path);
    }

    /**
     * Updates the translations files
     * @return void
     */
    public static function updateTranslations()
    {
        $path = resource_path('lang');
        (new Filesystem)->copyDirectory($this->resources.'lang', $path);
    }

    /**
     * Updates the style (sass) files
     * @return void
     */
    public static function updateStyles()
    {
        $path = resource_path('sass');
        (new Filesystem)->copyDirectory($this->resources.'sass', $path);
    }

    /**
     * Updates the views files
     * @return void
     */
    public static function updateViews()
    {
        $path = resource_path('views');
        (new Filesystem)->copyDirectory($this->resources.'views', $path);
    }

    /**
     * Updates the routes files
     * @return void
     */
    public static function updateRoutes()
    {
        $path = base_path('routes');
        (new Filesystem)->copyDirectory(__DIR__.'/stubs/backend/routes', $path);
    }

}
