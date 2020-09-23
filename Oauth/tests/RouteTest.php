<?php

use App\Models\User;

class RouteTest extends TestCase
{

    /**
     *Check if an email already exist
     * @covers
     */
    public function testShouldAlreadyUser()
    {

        $parameters = [
            'name' => 'james',
            'email' => 'test@test.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ];

        $this->json('Post', "/api/register", $parameters);
        $this->seeJson([
            "email"=>["The email has already been taken."]
        ]);
    }


    /**
     *Check if password match
     * @covers
     */
    public function testShouldInvalidPassword()
    {

        $parameters = [
            'name' => 'james',
            'email' => 'test@test.com',
            'password' => '12345678',
            'password_confirmation' => '1234567'
        ];

        $this->json('Post', "/api/register", $parameters);
        $this->seeJson([
            "password"=>["The password confirmation does not match."]
        ]);
    }


    /**
     * check if user is Authenticate
     */
    public function testAuthUser(){
        $user = User::factory()->make();
        $this->actingAs($user)->get('/api/user');
//        $this->assertResponseStatus(201);
    }





}
