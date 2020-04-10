<?php

namespace Nh\StarterPack;

use Laravel\Ui\Presets\Preset;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;

class UserPreset extends Preset
{
    /**
     * Install the preset
     * @return void
     */
    public static function install()
    {
        static::updateApp();
        static::updateDatabase();
        static::updateResources();
    }

    /**
     * Updates the app files
     * @return void
     */
    public static function updateApp()
    {
        $stub = __DIR__.'/../stubs/users/app';
        (new Filesystem)->copyDirectory($stub, app_path());
    }

    /**
     * Updates the dtabase files
     * @return void
     */
    public static function updateDatabase()
    {
        $stub = __DIR__.'/../stubs/users/database/';
        (new Filesystem)->copyDirectory($stub, database_path());
    }

    /**
     * Updates the resources files
     * @return void
     */
    public static function updateResources()
    {
        $stub = __DIR__.'/../stubs/users/resources/';
        (new Filesystem)->copyDirectory($stub.'views', resource_path('views'));
    }

}
