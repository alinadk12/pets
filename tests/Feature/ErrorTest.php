<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery;

class ErrorTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testError()
    {
        $response = $this->get('/dogs/store');
        $response->assertStatus(405);
    }
}
