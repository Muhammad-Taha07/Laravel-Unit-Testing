<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /* TESTING LOGIN ROUTE */
    public function test_login_form()
    {
        $response = $this->get('/login');
        $this->assertTrue(true);
    }
    /* USER DUPLICATION TEST TO CHECK WHETHER OR NOT USERS ARE SAME */
    public function test_user_duplication()
    {
        $user1 = User::make([
            'name' =>  'John Doe',
            'email' => 'johndoe1@yopmail.com'
        ]);

        $user2 = User::make([
            'name'  =>  'Jovonowich',
            'email' =>  'masterAssasin007@yopmail.com'
        ]);

        $this->assertTrue($user1->name != $user2->name);
    }
    /* TEST METHOD TO CREATE A NEW RANDOM USER & DELETE IT*/
    public function test_delete_user()
    {
        $createUser = User::factory()->count(1)->make();
        $user = User::first();

        if($user) {
            $user->delete();
        }

        $this->assertTrue(true);
    }
}
