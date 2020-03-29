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
        static::cleanResources();
        static::updateWebpack();
        static::updateProviders();
        static::updateScripts();
        static::updateTranslations();
        static::updateStyles();
    }

    /**
     * Update the NPM packages
     * @param  array $packages
     * @return array
     */
    public static function updatePackageArray($packages)
    {
        $laravel = Arr::except($packages, [
          // 'library',
        ]);

        $preset = [
          // 'library' => 'version',
        ];

        return array_merge($laravel,$preset);
    }

    /**
     * Clean the resources folders
     * @return void
     */
    public static function cleanResources()
    {
      (new Filesystem)->cleanDirectory(resource_path('js'));
      (new Filesystem)->cleanDirectory(resource_path('sass'));
      (new Filesystem)->cleanDirectory(resource_path('views'));
    }

    /**
     * Updates the webpack file
     * @return void
     */
    public static function updateWebpack()
    {
        copy(__DIR__.'/stubs/global/webpack.mix.js', base_path('webpack.mix.js'));
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
     * Updates the scripts files
     * @return void
     */
    public static function updateScripts()
    {
        $stub = __DIR__.'/stubs/global/resources/js';
        $path = resource_path('js');
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the translations files
     * @return void
     */
    public static function updateTranslations()
    {
        $stub = __DIR__.'/stubs/global/resources/lang';
        $path = resource_path('lang');
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the style (sass) files
     * @return void
     */
    public static function updateStyles()
    {
        $stub = __DIR__.'/stubs/global/resources/sass';
        $path = resource_path('sass');
        (new Filesystem)->copyDirectory($stub, $path);
    }

}
