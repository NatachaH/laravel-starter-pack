<?php

namespace Nh\StarterPack;

use Laravel\Ui\Presets\Preset;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;

class GlobalPreset extends Preset
{
    /**
     * Install the preset
     * @return void
     */
    public static function install()
    {

        static::updatePackages();
        static::updateProviders();
        static::updateResources();
        static::updateRoutes();
        static::updateWebpack();
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
          "bootstrap" => "^4.4.1",
          "jquery"    => "^3.2",
          "popper.js" => "^1.12"
        ];

        return array_merge($laravel,$preset);
    }

    /**
     * Updates the providers files
     * @return void
     */
    public static function updateProviders()
    {
        $stub = __DIR__.'/stubs/global/app/Providers';
        $path = app_path('Providers');
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

        $stub = __DIR__.'/stubs/global/resources/';

        (new Filesystem)->copyDirectory($stub.'js', resource_path('js'));
        (new Filesystem)->copyDirectory($stub.'lang', resource_path('lang'));

    }

    /**
     * Updates the routes files
     * @return void
     */
    public static function updateRoutes()
    {
        $stub = __DIR__.'/stubs/global/routes';
        $path = base_path('routes');
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the webpack file
     * @return void
     */
    public static function updateWebpack()
    {
        copy(__DIR__.'/stubs/global/webpack.mix.js', base_path('webpack.mix.js'));
    }

}
