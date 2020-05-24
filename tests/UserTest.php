<?php

use  App\User;

class UserTest extends TestCase
{
    
    /**
     * A User test.
     * @test
     *
     * @return void
     */
    public function createUser()
    {        

        $user = new User;
        $user->name = 'mario';
        $user->email = 'mario2@mario.com';
        $plainPassword = '12345';
        $user->password = app('hash')->make($plainPassword);

        $result = $user->save();       

        $this->seeInDatabase('users', ['email' => 'mario2@mario.com']);

        $user->delete();

        $this->notSeeInDatabase('users', ['email' => 'mario2@mario.com']);
        
    }

}
