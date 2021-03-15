<?php

namespace Tests\Feature\Api\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\Feature\Api\PassportTestCase;

class LoginTest extends PassportTestCase
{
    protected $apiRoute = "/api/v1/oauth/token/";

    public function test_login_by_correct_credentials_successfully()
    {
        // arrange
        $email = 'hello@test.ru';
        $password = "qwerty123";
        $credentials = $this->getLoginCredentials($email, $password);
        $user = User::factory()->create([
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        // act
        $response = $this->json('POST', $this->apiRoute, $credentials);

        // assert
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'token_type','expires_in','access_token','refresh_token'
        ]);
    }

    public function test_login_by_incorrect_credentials_fail()
    {
        // arrange
        $email = uniqid().'@test.ru';
        $password = "qwerty123";
        $wrongPassword = "12312";
        $credentials = $this->getLoginCredentials($email, $wrongPassword);
        $user = User::factory()->create([
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        // act
        $response = $this->json('POST', $this->apiRoute, $credentials);

        // assert
        $response->assertStatus(400);
    }
}
