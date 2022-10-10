<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class expirationchild extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The Children is Expire';

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
     * @return void
     */
    public function handle()
    {

      $users =  User::where('status','مفعل') -> get(); //collection get users
        foreach ($users as $user) {
            $user->update(['status' =>  'غير مفعل']) ;
        }
        $admins = User::where('id',1) -> get();
        foreach ($admins as $admin) {
            $admin->update(['status' =>  'مفعل']) ;
        }

    }
}
