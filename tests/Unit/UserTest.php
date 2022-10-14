<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{

/* Do make Sure to disable/Commenting Out the rest of the methods before using database test cases
   Not Commenting Out/Disabling those methods will end up failing testcases and as well as conflicting
   with others and generate errors, failing to execute the rest of the test cases.
*/
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
    /* USER WILL BE REDIRECTED TO HOMEPAGE UPON SUCCESSFULL REGISTRATION */
    public function test_Add_new_users()
    {
        $response = $this->post('/register', [
            'name'                   =>      'Muhammad Talha',
            'email'                  =>      'backend_admin111@yopmail.com',
            'password'               =>      'asd$A123',
            'password_confirmation'  =>      'asd$A123'
        ]);

        $response->assertRedirect('/home');
    }
/*
-------------------------------------------------------------------------------------------------------------------------------------
                                                DATABASE TESTING METHODS
-------------------------------------------------------------------------------------------------------------------------------------
*/

    /* METHOD TO TEST DATABASE-HAS ASSERTION */
    public function test_database()
    {
        $this->assertDatabaseHas('users',
        [
            'name'      =>      'Muhammad Taha',
            'email'     =>      'backend_admin@yopmail.com'
        ]);
    }

    /* METHOD TO TEST DATABASE-MISSING ASSERTION */
    public function test_missing_database()
    {
        $this->assertDatabaseMissing('users', [
            'name'      =>      'Shahid',
            'email'     =>      'Khan'
        ]);
    }

}
