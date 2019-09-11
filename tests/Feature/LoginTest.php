<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_is_user_passing_wrong_credentials()
    {
        //Arrange
        $user=factory(\App\User::class)->create();
        //Action and Assert
        $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'this_is_very_wrong'
        ])->assertStatus(422)
        ->assertJson([
            'message' => 'These credentials do not match our records.'
        ]);
    }

    /**
     * @group loginsuccess
     * A basic feature test example.
     *
     * @return void
     */
    public function test_is_user_login_successful()
    {
        //Arrange
        $user=factory(\App\User::class)->create(['password' => bcrypt('secret')]);
        
        //Action and Assert
        $this->postJson('/login', [
            'email' => $user->email,
            'password' => 'secret'
        ])->assertStatus(200)
        ->assertSee($user->username);
    }
}
