<?php

namespace Nh\StarterPack;

use Laravel\Ui\Presets\Preset;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Finder\SplFileInfo;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class StarterPackPreset extends Preset
{
    /**
     * Install the preset
     * @return void
     */
    public static function install()
    {
        static::updatePackages();
        static::updateApp();
        static::updateConfig();
        static::updateDatabase();
        static::updateResources();
        static::updateRoutes();
        static::updateWebpack();
        static::installAuth();
    }

    /**
     * Update the NPM packages
     * @param  array $packages
     * @return array
     */
    public static function updatePackageArray($packages)
    {
        $laravel = Arr::except($packages, [
          'lodash'
        ]);

        $preset = [
          "bootstrap" => "^5.0.0-alpha3",
          "popper.js" => "^1.12",
          "quill" => "^1.3.6",
          "sortablejs" => "^1.10.2",
          "flatpickr" => "^4.6.3"
        ];

        return array_merge($laravel,$preset);
    }

    /**
     * Updates the providers files
     * @return void
     */
    public static function updateApp()
    {
        $stub = __DIR__.'/../stubs/sp/app';
        $path = app_path();
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the config files
     * @return void
     */
    public static function updateConfig()
    {
        $stub = __DIR__.'/../stubs/sp/config';
        $path = config_path();
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the database files
     * @return void
     */
    public static function updateDatabase()
    {
        $stub = __DIR__.'/../stubs/sp/database';
        $path = database_path();
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Update the resources folders
     * @return void
     */
    public static function updateResources()
    {
        (new Filesystem)->cleanDirectory(resource_path('js'));
        (new Filesystem)->cleanDirectory(resource_path('sass'));
        (new Filesystem)->cleanDirectory(resource_path('views'));

        $stub = __DIR__.'/../stubs/sp/resources/';

        (new Filesystem)->copyDirectory($stub.'js', resource_path('js'));
        (new Filesystem)->copyDirectory($stub.'lang', resource_path('lang'));
        (new Filesystem)->copyDirectory($stub.'sass', resource_path('sass'));
        (new Filesystem)->copyDirectory($stub.'views', resource_path('views'));
    }

    /**
     * Updates the routes files
     * @return void
     */
    public static function updateRoutes()
    {
        $stub = __DIR__.'/../stubs/sp/routes';
        $path = base_path('routes');
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the webpack file
     * @return void
     */
    public static function updateWebpack()
    {
        copy(__DIR__.'/../stubs/sp/webpack.mix.js', base_path('webpack.mix.js'));
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
