<?php

use Illuminate\Database\Seeder;
use App\Brand_name;

class BrandNamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('brands')->delete();
        DatabaseSeeder::ClearTable('brands');

        Brand_name::create(array('name' => 'GO!'));
        Brand_name::create(array('name' => 'Pedigree'));
        Brand_name::create(array('name' => 'Royal Canin'));
        Brand_name::create(array('name' => 'Arcon'));
        Brand_name::create(array('name' => 'V.I.Pet'));
        Brand_name::create(array('name' => 'Triol'));
    }
}
