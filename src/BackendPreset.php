<?php

namespace Nh\StarterPack;

use Laravel\Ui\Presets\Preset;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Finder\SplFileInfo;
use Illuminate\Support\Str;

class BackendPreset extends Preset
{
    /**
     * Install the preset
     * @return void
     */
    public static function install()
    {
        static::updatePublic();
        static::updateResources();
        static::installAuth();
    }

    /**
     * Updates the public files
     * @return void
     */
    public static function updatePublic()
    {
        $stub = __DIR__.'/../stubs/backend/public';
        $path = public_path();
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the resources files
     * @return void
     */
    public static function updateResources()
    {
        $stub = __DIR__.'/../stubs/backend/resources/';
        (new Filesystem)->copyDirectory($stub.'js', resource_path('js'));
        (new Filesystem)->copyDirectory($stub.'lang', resource_path('lang'));
        (new Filesystem)->copyDirectory($stub.'sass', resource_path('sass'));
        (new Filesystem)->copyDirectory($stub.'views', resource_path('views'));
    }

    /**
     * Create the Auth controllers files
     * @return void
     */
    public static function installAuth()
    {
        // Create the Auth folder
        if (! is_dir($directory = app_path('Http/Controllers/Auth'))) {
           mkdir($directory, 0755, true);
        }

        // Get all Auth controlers files from Laravel & add them in Controller folder
        $filesystem = new Filesystem;
        collect($filesystem->allFiles(base_path('vendor/laravel/ui/stubs/Auth')))
        ->each(function (SplFileInfo $file) use ($filesystem) {
            $filesystem->copy(
                $file->getPathname(),
                app_path('Http/Controllers/Auth/'.Str::replaceLast('.stub', '.php', $file->getFilename()))
            );
        });

        // Get all Auth migrations files from Laravel & add them in Migration folder
        collect($filesystem->allFiles(base_path('vendor/laravel/ui/stubs/migrations')))
        ->each(function (SplFileInfo $file) use ($filesystem) {
            $filesystem->copy(
                $file->getPathname(),
                database_path('migrations/'.$file->getFilename())
            );
        });
    }

}
