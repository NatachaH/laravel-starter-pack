<?php

namespace Nh\StarterPack\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
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

    protected $stub = __DIR__.'/../../../stubs/sp/';

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

        $this->updateApp();
        $this->updateConfig();
        $this->updateDatabase();
        $this->updateResources();
        $this->updateRoutes();
        $this->updateViteJS();

        // Artisan commandes for Bootstrap Component Package
        Artisan::call('vendor:publish --tag=bs-component');

        // Artisan commandes for Access Control Package
        Artisan::call('vendor:publish --tag=access-control');

        // Make User roleable
        Artisan::call('role:new --model=user');

        // Artisan commandes for Mediable Package
        Artisan::call('vendor:publish --tag=mediable');

        // Artisan commandes for Trackable Package
        Artisan::call('vendor:publish --tag=trackable');

        // Confirm every thing ok
        $this->info('The preset Starter Pack has been installed !');

    }

    /**
     * Updates the providers files
     * @return void
     */
    private function updateApp()
    {
        $stub = $this->stub.'/app';
        $path = app_path();
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the config files
     * @return void
     */
    private function updateConfig()
    {
        $stub = $this->stub.'/config';
        $path = config_path();
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the database files
     * @return void
     */
    private function updateDatabase()
    {
        $stub = $this->stub.'/database';
        $path = database_path();
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Update the resources folders
     * @return void
     */
    private function updateResources()
    {
        (new Filesystem)->cleanDirectory(resource_path('css'));
        (new Filesystem)->cleanDirectory(resource_path('js'));
        (new Filesystem)->cleanDirectory(resource_path('scss'));
        (new Filesystem)->cleanDirectory(resource_path('views'));

        $stub = $this->stub.'/resources/';

        (new Filesystem)->copyDirectory($stub.'js', resource_path('js'));
        (new Filesystem)->copyDirectory($stub.'lang', base_path('lang'));
        (new Filesystem)->copyDirectory($stub.'scss', resource_path('scss'));
        (new Filesystem)->copyDirectory($stub.'views', resource_path('views'));
    }

    /**
     * Updates the routes files
     * @return void
     */
    private function updateRoutes()
    {
        $stub = $this->stub.'/routes';
        $path = base_path('routes');
        (new Filesystem)->copyDirectory($stub, $path);
    }

    /**
     * Updates the vite JS file
     * @return void
     */
    private function updateViteJS()
    {
        copy($this->stub.'/vite.config.js', base_path('vite.config.js'));
    }

}
