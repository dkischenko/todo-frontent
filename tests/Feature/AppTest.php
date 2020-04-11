<?php

namespace Tests\Feature;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class AppTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function non_authentificated_user_cant_access_user_part()
    {
        $this->withoutExceptionHandling([AuthenticationException::class]);
        $this->get('/tasks/create')->assertRedirect('login');
    }
}


