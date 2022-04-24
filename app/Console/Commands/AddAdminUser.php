<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AddAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin';

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
     * @return int
     */
    public function handle()
    {
        $username = $this->validate_cmd(function() {
            return $this->ask('Enter username [Eg: example, exampleName, ExampleName1]?');
        }, ['username','required|regex:/(^[A-Za-z0-9]+$)+/|max:255']);

        $email = $this->validate_cmd(function() {
            return $this->ask('Enter email [Eg: example@example.com]?');
        }, ['email','required|email|max:255|unique:admins']);

        $password = $this->validate_cmd(function() {
            return $this->ask('Enter password [Eg: password, passWord12#](minimum: 8 letters)?');
        }, ['email','required|max:255|string|min:8|max:255|regex:/(^[A-Za-z0-9_\-!@#$%&]+$)+/']);
        
        if($this->confirm('Are you sure you want to create admin with this email and username?')){
            Admin::create([
                'username' => $username,
                'email' =>$email,
                'password' => Hash::make($password),
                'email_verified_at' => now()
            ]);
            return $this->info('New admin user created successfully');
        }
        return $this->warn('No new admin was created');
    }
    public function validate_cmd($method, $rules)
    {
       
        $value = $method();
        $validate = $this->validateInput($rules, $value);

        if ($validate !== true) {
            $this->error($validate);
            $value = $this->validate_cmd($method, $rules);
        }
        return $value;
    }

    public function validateInput($rules, $value)
    {
        $validator = Validator::make([$rules[0] => $value], [ $rules[0] => $rules[1] ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            return $error->first($rules[0]);
        }else{
            return true;
        }

    }
}
