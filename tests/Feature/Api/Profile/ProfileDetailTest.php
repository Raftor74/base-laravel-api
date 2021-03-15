<?php

namespace Tests\Feature\Api\Profile;

use App\Models\User;
use Tests\Feature\Api\ApiTestCase;

class ProfileDetailTest extends ApiTestCase
{
    public function test_authorized_user_can_show_profile()
    {
        // arrange
        $user = User::factory()->create();
        $this->authorizeUser($user);

        // act
        $response = $this->json('GET', route('profile.index'));

        // assert
        $response->assertStatus(200);
    }

    public function test_unauthorized_user_cannot_show_profile()
    {
        // arrange
        $user = User::factory()->create();

        // act
        $response = $this->json('GET', route('profile.index'));

        // assert
        $response->assertStatus(401);
    }
}
