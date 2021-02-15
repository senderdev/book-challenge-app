<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Date;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class SendBookTest extends TestCase
{
    use RefreshDatabase;

    private $url = 'book/send';

    public function test_send()
    {
        $user = User::factory()->create();
        Sanctum::actingAs(
            $user,
        );

        $request = $this->request();

        $response = $this->postJson(
            $this->url,
            $request
        );

        $this->assertDatabaseHas('books',[
           'user_id' => $user->id,
           'category' => $request['category'],
           'title' => $request['title'],
           'started_at' => $request['started_at'],
           'ended_at' => $request['ended_at']
        ]);
        $response->assertStatus(201);
    }

    public function test_required_auth()
    {
        $response = $this->postJson(
            $this->url,
            $this->request()
        );

        $response->assertStatus(401);
    }

    public function test_ended_at_must_be_after_started_at()
    {
        Sanctum::actingAs(
            User::factory()->create(),
        );

        $request = $this->request();
        $request['ended_at'] = $request['started_at'];

        $response = $this->postJson(
            $this->url,
            $request
        );

        $response->assertStatus(422);
    }

    private function request()
    {
        $startedAt = Date::now()->format('Y-m-d H:i:s');
        $endedAt = Date::now()->addMonth()->format('Y-m-d H:i:s');

        return [
            'category' => 'Category 1',
            'title' => 'Title 1',
            'started_at' => $startedAt,
            'ended_at' => $endedAt
        ];
    }
}
