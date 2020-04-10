<?php

namespace Nh\StarterPack\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

use App\User;
use Nh\AccessControl\Models\Role;

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
        $name = $this->anticipate('What is the name ?', ['natacha']);
        $email = $this->anticipate('What is the email ?', ['info@natachaherth.ch']);
        $password = $this->secret('What is the password?');
        $roleName = $this->anticipate('What is the role ?', ['superadmin','admin']);

        $user = User::updateOrCreate(
            ['email' => $email],
            ['name' => $name, 'password' => $password]
        );

        $role = Role::where('name',$roleName)->first();

        if(!empty($role))
        {
            $user->role()->associate($role)->save();
        }

        // End
        $this->line('The user '.$name.' has been created !');

    }


}
