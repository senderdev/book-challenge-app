<?php

namespace Tests\Feature\Services;

use App\Models\User;
use App\Services\AccessTokenService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccessTokenServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_create()
    {
        /** @var AccessTokenService $service */
        $service = $this->app->make(AccessTokenService::class);

        $user = User::factory()->create();

        $token = $service->create($user);

        $this->assertDatabaseHas('personal_access_tokens', [
            'tokenable_id' => $user->id
        ]);
        $this->assertIsString($token->plainTextToken);
    }

    public function test_revoke()
    {
        /** @var AccessTokenService $service */
        $service = $this->app->make(AccessTokenService::class);

        /** @var User $user */
        $user = User::factory()->create();

        $service->create($user);
        $service->revoke($user);

        $this->assertDatabaseMissing('personal_access_tokens', [
           'tokenable_id' => $user->id
        ]);
    }
}
