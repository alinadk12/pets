<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Country;

class DatabaseTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDatabase()
    {
        $country = new Country(['name_ru' => 'Россия', 'name_en' => 'Russia']);
        $country->save();
        $this->assertDatabaseHas('countries', ['name_en' => 'Russia']);
    }
}
