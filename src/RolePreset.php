<?php

namespace Nh\StarterPack;

use Laravel\Ui\Presets\Preset;
use Illuminate\Filesystem\Filesystem;

use Artisan;

class RolePreset extends Preset
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

        // Publish the access-control packages and make migration for user
        Artisan::call('vendor:publish --tag=access-control');
        Artisan::call('role:new user');

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
     * Updates the dtabase files
     * @return void
     */
    public static function updateDatabase()
    {
        $stub = __DIR__.'/../stubs/roles/database/';
        (new Filesystem)->copyDirectory($stub, database_path());
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
