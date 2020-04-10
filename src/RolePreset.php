<?php

namespace Nh\StarterPack;

use Laravel\Ui\Presets\Preset;
use Illuminate\Filesystem\Filesystem;

class RolePreset extends Preset
{
    /**
     * Install the preset
     * @return void
     */
    public static function install()
    {
        static::updateApp();
        static::updateResources();
    }

    /**
     * Updates the app files
     * @return void
     */
    public static function updateApp()
    {
        $stub = __DIR__.'/../stubs/roles/app';
        (new Filesystem)->copyDirectory($stub, app_path());
    }

    /**
     * Updates the resources files
     * @return void
     */
    public static function updateResources()
    {
        $stub = __DIR__.'/../stubs/roles/resources/';
        (new Filesystem)->copyDirectory($stub.'views', resource_path('views'));
    }

}
