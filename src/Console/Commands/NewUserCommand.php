<?php

namespace Nh\StarterPack\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Role;

class NewUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:new';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

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

        // Defines
        $name = $this->anticipate('What is the name ?', ['Natacha']);
        $email = $this->anticipate('What is the email ?', ['info@natachaherth.ch']);
        $password = $this->secret('What is the password?');

        // Create the user
        $user = User::updateOrCreate(
            ['email' => $email],
            ['name' => $name, 'password' => $password]
        );

        // Associate the role
        $roles = Role::select('name')->get()->pluck('name')->toArray();
        $role_name = $this->choice('What is the name of the role ?',$roles);
        $role = Role::firstWhere('name',$role_name);
        $user->role()->associate($role)->save();

        // End
        $this->line('The user '.$name.' has been created !');

    }

}
