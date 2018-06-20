<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Country;

class CountryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCountry()
    {
        $country = new Country(['name_ru' => 'Россия', 'name_en' => 'Russia']);
        $this->assertEquals('Russia', $country->name_en);
    }
}
