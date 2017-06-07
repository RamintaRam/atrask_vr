<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Ramsey\Uuid\Uuid;

class AdminCreate extends Command
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
    protected $description = 'Command creates admin';

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
        $this->comment('Creating Administrator');

        $record = [
            'id'=> Uuid::uuid4(),
            'name'=> $name = $this->ask('Please provide admins name'),
            'surname'=> $lastName = $this->ask('Please provide admins surname'),
            'email'=> $email = $this->ask('Please provide admins email'),
            'phone'=> $phone = $this->ask('Please provide admins phone number'),
            'password'=> bcrypt($password = $this->secret('Please provide password')),


        ];

//        VRUsers::create($record);
    }
}
