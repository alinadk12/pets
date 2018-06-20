<?php

use Illuminate\Database\Seeder;
use App\Good_type;

class GoodTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('good_types')->delete();
        DatabaseSeeder::ClearTable('good_types');

        Good_type::create(array('type_en' => 'Feed', 'type_ru' => 'Корма'));
        Good_type::create(array('type_en' => 'Bowls', 'type_ru' => 'Миски'));
        Good_type::create(array('type_en' => 'Toys', 'type_ru' => 'Игрушки'));
        Good_type::create(array('type_en' => 'Accessories', 'type_ru' => 'Аксессуары'));
        Good_type::create(array('type_en' => 'Carrying', 'type_ru' => 'Переноски'));
    }
}