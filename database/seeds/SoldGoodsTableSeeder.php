<?php

use Illuminate\Database\Seeder;
use App\Sold_good;

class SoldGoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('sold_goods')->delete();
        DatabaseSeeder::ClearTable('sold_goods');

        Sold_good::create(array('good_id' => '3', 'user_id' => '3', 'employee_id' => '2', 'date' => '2016-11-07 09:05:00'));
        Sold_good::create(array('good_id' => '5', 'user_id' => '3', 'employee_id' => '2', 'date' => '2016-11-07 09:13:00'));
    }
}
