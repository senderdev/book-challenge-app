<?php

namespace Tests\Feature\Api\User;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_register()
    {
        $request = [
            'email' => 'testing@example',
            'password' => '123453asdasd'
        ];
        $response = $this->postJson('user/register', $request);

        $this->assertDatabaseHas('users', [
            'email' => 'testing@example'
        ]);
        $this->assertStringContainsString('access_token', $response->content());
        $response->assertStatus(200);
    }

    /**
     * @dataProvider requestDataProvider
     *
     * @param $email
     * @param $password
     */
    public function test_validation($email, $password)
    {
        $this->seed([
            UserSeeder::class,
        ]);

        $request = [
            'email' => $email,
            'password' => $password
        ];

        $response = $this->postJson('user/register', $request);
        $response->assertStatus(422);
    }

    public function requestDataProvider()
    {
        return [
            ['email@', '123453asdasd'],
            ['email@example.com', ''],
            ['', '123453asdasd']
        ];
    }
}
