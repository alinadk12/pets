<?php

use Illuminate\Database\Seeder;
use App\Sold_puppy;

class SoldPuppiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('sold_puppies')->delete();
        DatabaseSeeder::ClearTable('sold_puppies');

        Sold_puppy::create(array('user_id' => '3', 'employee_id' => '2', 'puppy_id' => '2', 'date' => '2016-08-07 13:05:00'));
        Sold_puppy::create(array('user_id' => '3', 'employee_id' => '2', 'puppy_id' => '1', 'date' => '2016-08-16 17:27:00'));
        Sold_puppy::create(array('user_id' => '3', 'employee_id' => '2', 'puppy_id' => '3', 'date' => '2016-08-28 11:34:00'));
    }
}
