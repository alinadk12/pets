<?php

use Illuminate\Database\Seeder;
use App\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('reviews')->delete();
        DatabaseSeeder::ClearTable('reviews');

        Review::create(
            array('user_id' => '3', 'text' => 'Отличный питомник, грамотные и доброжелательные заводчики!
        Большое спасибо вам за нашу собаку!', 'published' => '0')
        );

        Review::create(
            array('user_id' => '3', 'text' => 'Отличный питомник ,все собачки красивые и породные ,чемпионы,
        с хорошим здоровьем . Мы очень довольны выбором .Всем рекомендуем.', 'published' => '1')
        );

    }
}
