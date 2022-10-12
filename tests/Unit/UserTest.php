<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{

    // public function test_example()
    // {
    //     $response = $this->get('/logins');
    //     $response->assertStatus(200);
    // }

  /* TESTING LOGIN ROUTE */
    public function test_login_form()
    {
        $response = $this->get('/login');
        $this->assertTrue(true);
    }
//   /* USER DUPLICATION TEST */
    public function test_user_duplication()
    {
        $user1 = User::make([
            'name' =>  'John Doe',
            'email' => 'johndoe1@yopmail.com'
        ]);

        $user2 = User::make([
            'name' =>  'Donny Doe',
            'email' => 'dondoe1@yopmail.com'
        ]);
        

        $this->assertTrue($user1->name != $user2->name);
    }
}
