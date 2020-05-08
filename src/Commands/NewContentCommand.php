<?php

namespace Nh\StarterPack\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class NewContentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'content:new {model? : the name of the new model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new basic content';

    /**
     * Name of the model
     * @var string
     */
    protected $name;

    /**
     * Name of the model in plural
     * @var string
     */
    protected $pname;

    /**
     * Name of the model uppercase
     * @var string
     */
    protected $ucname;

    /**
     * Name of the model plural and uppercase
     * @var string
     */
    protected $ucpname;

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

        // Defines names and variables
        $name = $this->argument('model');
        if(empty($name))
        {
            $name = $this->ask('What is the name of the model (singular/lowercase) ?');
        }

        $this->name     = $name;
        $this->pname    = Str::plural($name);
        $this->ucname   = ucfirst($name);
        $this->ucpname  = ucfirst($this->pname);

        // Define if need the soft delete
        $softdelete = $this->confirm('Is the model using SoftDeletes ? [yes|no]', false);

        // Copy the files
        $stub = __DIR__.'/../../stubs/content/';

        // Controller
        $this->create_folder(app_path('Http/Controllers/Backend'));
        $sp_controller   = $stub.'app/Http/Controllers/Backend/Content'.($softdelete ? 'SD' : '').'Controller.php';
        $new_controller  = app_path('Http/Controllers/Backend/'.$this->ucname.'Controller.php');
        $this->copy_file($sp_controller,$new_controller);

        // Request (Global stub)
        $this->create_folder(app_path('Http/Requests'));
        $sp_request   = $stub.'app/Http/Requests/StoreContentRequest.php';
        $new_request  = app_path('Http/Requests/Store'.$this->ucname.'Request.php');
        $this->copy_file($sp_request,$new_request);

        // Policy
        $this->create_folder(app_path('Policies'));
        $sp_policy   = $stub.'app/Policies/Content'.($softdelete ? 'SD' : '').'Policy.php';
        $new_policy  = app_path('Policies/'.$this->ucname.'Policy.php');
        $this->copy_file($sp_policy,$new_policy);

        // Model
        $sp_model   = $stub.'app/Content'.($softdelete ? 'SD' : '').'.php';
        $new_model  = app_path($this->ucname.'.php');
        $this->copy_file($sp_model,$new_model);

        // Database
        $sp_database   = $stub.'database/migrations/0000_00_00_000000_create_contents'.($softdelete ? 'SD' : '').'_table.php';
        $new_database  = database_path('migrations/'.date('Y_m_d').'_000000_create_'.$this->pname.'_table.php');
        $this->copy_file($sp_database,$new_database);

        // View (Global stub)
        $views = glob($stub.'resources/views/backend/contents/*.php', GLOB_BRACE);
        $folder = resource_path('views/backend/'.$this->pname);
        $this->create_folder($folder);

        foreach($views as $view) {
            if(!$softdelete && basename($view) == 'trashed.blade.php')
            {
              continue;
            }
            $sp_view = $view;
            $new_view = $folder.'/'.basename($sp_view);
            $this->copy_file($sp_view,$new_view);
        }

        $subviews = glob($stub.'resources/views/backend/contents/listing/*.php', GLOB_BRACE);
        $folder = resource_path('views/backend/'.$this->pname.'/listing');
        $this->create_folder($folder);

        foreach($subviews as $view) {
            $sp_view = $view;
            $new_view = $folder.'/'.basename($sp_view);
            $this->copy_file($sp_view,$new_view);
        }

        // Route
        $backendRoute = base_path('routes/backend.php');
        if(file_exists($backendRoute))
        {
            $new_route = file_get_contents($stub.'/routes/route'.($softdelete ? 'SD' : '').'.stub');
            $new_route = str_replace('{{ NAME }}', $this->name, $new_route);
            $new_route = str_replace('{{ UCNAME }}', $this->ucname, $new_route);
            $new_route = str_replace('{{ UCPNAME }}', $this->ucpname, $new_route);
            $new_route = str_replace('{{ PNAME }}', $this->pname, $new_route);
            file_put_contents(
                $backendRoute,
                $new_route,
                FILE_APPEND
            );
        }

        // Config
        $backendConfig = config_path('backend.php');
        if(file_exists($backendConfig))
        {
            $new_config = file_get_contents($stub.'/config/backend.stub');
            $new_config = str_replace('{{ NAME }}', $this->name, $new_config);
            $new_config = str_replace('{{ UCNAME }}', $this->ucname, $new_config);
            $new_config = str_replace('{{ PNAME }}', $this->pname, $new_config);
            file_put_contents($backendConfig, str_replace('//{{ COPY CONFIG }}', $new_config, file_get_contents($backendConfig)));
        }


        if($softdelete)
        {
            // Route binding
            $provider = app_path('Providers/RouteServiceProvider.php');
            if(file_exists($provider))
            {
                $new_provider = file_get_contents($stub.'/app/Providers/RouteServiceProvider.stub');
                $new_provider = str_replace('{{ NAME }}', $this->name, $new_provider);
                $new_provider = str_replace('{{ UCNAME }}', $this->ucname, $new_provider);
                file_put_contents($provider, str_replace('//{{ COPY ROUTE BINDING }}', $new_provider, file_get_contents($provider)));
            }
        }


        // End
        $this->info('The model '.$this->name.' has been created !');

        // Run the artisan commande for create the permissions of the new model (nh/access-control)
        $permission = $this->confirm('Do you want to create the permissions for this model ? [yes|no]', true);
        if($permission)
        {
            $this->call('permission:new', ['--model' => $this->name, '--softDelete' => $softdelete ]);
        }

    }

    /**
     * Copy a stub file to a destination and replace the {{ NAME }}, {{ PNAME }}, {{ UCNAME }} and {{ UCPNAME }}
     * @param  string $original    File to copy
     * @param  string $destination Destination of the new file
     * @return void
     */
    private function copy_file($original, $destination)
    {
        if (!copy($original, $destination)) {
            echo "failed to copy";
        } else {
            file_put_contents($destination, str_replace('{{ NAME }}', $this->name, file_get_contents($destination)));
            file_put_contents($destination, str_replace('{{ UCNAME }}', $this->ucname, file_get_contents($destination)));
            file_put_contents($destination, str_replace('{{ UCPNAME }}', $this->ucpname, file_get_contents($destination)));
            file_put_contents($destination, str_replace('{{ PNAME }}', $this->pname, file_get_contents($destination)));
        }
    }

    /**
     * Create a folder if not exist
     * @param  string $folder Folder path
     * @return void
     */
    private function create_folder($folder)
    {
        if(!is_dir($folder))
        {
            mkdir($folder, 0777, true);
        }
    }

}
