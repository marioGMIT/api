<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Disable foreign key checking because truncate() will fail
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');        
        User::truncate();

        // Creating main user
        $hasher = app()->make('hash');    
        App\User::create([            
            'name' => 'mario',
            'email' => 'mario@mario.com',
            'password' => $hasher->make("12345")
        ]);
       
        factory(User::class, 10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
