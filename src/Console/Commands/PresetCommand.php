<?php

namespace Nh\StarterPack\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Finder\SplFileInfo;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Artisan;

class PresetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'preset:sp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Init the starter-pack preset.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        static::updateApp();
        static::updateConfig();
        static::updateDatabase();
        static::updateResources();
        static::updateRoutes();
        static::updateWebpack();

        // Artisan commandes for Bootstrap Component Package
        Artisan::call('vendor:publish --tag=bs-component');

        // Artisan commandes for Access Control Package
        Artisan::call('vendor:publish --tag=access-control');
        Artisan::call('role:new user');

        // Artisan commandes for Mediable Package
        Artisan::call('vendor:publish --tag=mediable');

        // Artisan commandes for Trackable Package
        Artisan::call('vendor:publish --tag=trackable');

        $this->line('The preset Srater Pack has been installed !');

    }

    /**
     * Updates the providers files
     * @return void
     */
    private static function updateApp()
    {
        $stub = __DIR__.'/../stubs/sp/app';
        $path = app_path();
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the config files
     * @return void
     */
    private static function updateConfig()
    {
        $stub = __DIR__.'/../stubs/sp/config';
        $path = config_path();
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the database files
     * @return void
     */
    private static function updateDatabase()
    {
        $stub = __DIR__.'/../stubs/sp/database';
        $path = database_path();
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Update the resources folders
     * @return void
     */
    private static function updateResources()
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
    private static function updateRoutes()
    {
        $stub = __DIR__.'/../stubs/sp/routes';
        $path = base_path('routes');
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the webpack file
     * @return void
     */
    private static function updateWebpack()
    {
        copy(__DIR__.'/../stubs/sp/webpack.mix.js', base_path('webpack.mix.js'));
    }

}
