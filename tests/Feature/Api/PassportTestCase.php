<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PassportTestCase extends TestCase
{
    use RefreshDatabase;

    protected $passportClientId;
    protected $passportClientSecret;

    public function setUp(): void
    {
        parent::setUp();
        $this->installPassport();
    }

    protected function installPassport(): void
    {
        \Artisan::call('passport:install');

        $table = 'oauth_clients';
        $credentials = DB::table($table)
            ->where('password_client', '=', 1)
            ->first();

        $this->passportClientId = $credentials->id;
        $this->passportClientSecret = $credentials->secret;
    }

    protected function getLoginCredentials(string $username, string $password): array
    {
        return [
            'grant_type' => 'password',
            'username' => $username,
            'password' => $password,
            'client_id' => $this->passportClientId,
            'client_secret' => $this->passportClientSecret,
        ];
    }
}
