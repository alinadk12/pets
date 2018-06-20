<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Mockery as m;
use Mockery\Mock;
use Illuminate\Database\Eloquent\Collection as collection;

class CollectionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testCollection()
    {
        $user = User::find(2);

        $this->actingAs($user)
            ->get('/dogs/create')
            ->assertViewHas('breeds');
    }

}
