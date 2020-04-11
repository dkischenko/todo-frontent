<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;
    /** @test */
    public function user_can_login()
    {
        $this->withoutExceptionHandling();

        /** @var User $user */
        $user = factory(User::class)->create();
        $this
            ->actingAs($user)
            ->get('/')
            ->assertStatus(200)
            ->assertSee($user->name);
    }
}
