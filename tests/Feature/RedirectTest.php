<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RedirectTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRedirect()
    {
        $response = $this->get('/dogs/create');
        $response->assertRedirect('/register');
    }
}
