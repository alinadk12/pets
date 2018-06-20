<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('countries')->delete();
        DatabaseSeeder::ClearTable('countries');

        Country::create(array('name_en' => 'United Kingdom', 'name_ru' => 'Великобритания'));
        Country::create(array('name_en' => 'Mexico', 'name_ru' => 'Мексика'));
    }
}
