<?php

namespace Nh\StarterPack\NewContent\Commands;

use Illuminate\Console\Command;

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
        $pname = Str::plural($name);
        $ucname = ucfirst($name);
        $ucpname = ucfirst($pname);

        // Copy the files
        $stub = __DIR__.'/../stubs/spcontents/';

        // Controller
        $sp_controller   = $stub.'app/Http/Controllers/Backend/SpcontentController.php';
        $new_controller  = app_path('Http/Controllers/Backend/'.$ucname.'Controller.php');
        $this->copy_file($sp_controller,$new_controller)

        // Request
        $sp_request   = $stub.'app/Http/Requests/StoreSpcontentRequest.php';
        $new_request  = app_path('Http/Requests/Store'.$ucname.'Request.php');
        $this->copy_file($sp_request,$new_request)

        // Observer
        $sp_observer   = $stub.'app/Observers/SpcontentObserver.php';
        $new_observer  = app_path('Observers/'.$ucname.'Observer.php');
        $this->copy_file($sp_observer,$new_observer)

        // Policy
        $sp_policy   = $stub.'app/Policies/SpcontentPolicy.php';
        $new_policy  = app_path('Policies/'.$ucname.'Policy.php');
        $this->copy_file($sp_policy,$new_policy)

        // Model
        $sp_model   = $stub.'app/Spcontent.php';
        $new_model  = app_path($ucname.'.php'));
        $this->copy_file($sp_model,$new_model)

        // Database
        $sp_database   = $stub.'database/migrations/0000_00_00_000000_create_spcontents_table.php';
        $new_database  = database_path('migrations/'.date('Y_m_d').'_000000_create_'.$pname.'_table.php');
        $this->copy_file($sp_database,$new_database)

        // View
        $views = glob($stub.'resources/views/backend/spcontents', GLOB_BRACE);
        foreach($views as $view) {
          $sp_view = basename($view);
          $new_view = resource_path('views/backend/'.$pname);
          $this->copy_file($sp_view,$new_view)
        }

        // End
        $this->line('The model '.$name.' has been created !');


    }

    /**
     * Copy a stub file to a destination and replace the {{ NAME }}, {{ PNAME }}, {{ UNAME }} and {{ UPNAME }}
     * @param  string $original    File to copy
     * @param  string $destination Destination of the new file
     * @param  string $name
     * @param  string $pname
     * @param  string $ucname
     * @param  string $ucpname
     * @return void
     */
    public function copy_file($original, $destination, $name, $pname, $ucname, $ucpname)
    {
        if (!copy($original, $destination)) {
            echo "failed to copy";
        } else {
          file_put_contents($destination, str_replace('{{ NAME }}', $name, file_get_contents($destination)));
          file_put_contents($destination, str_replace('{{ UCNAME }}', $ucname, file_get_contents($destination)));
          file_put_contents($destination, str_replace('{{ UCPNAME }}', $ucpname, file_get_contents($destination)));
          file_put_contents($destination, str_replace('{{ PNAME }}', $pname, file_get_contents($destination)));
        }
    }

}
