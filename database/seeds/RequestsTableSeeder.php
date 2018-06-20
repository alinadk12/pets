<?php

use Illuminate\Database\Seeder;
use App\PuppyRequest;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('requests')->delete();
        DatabaseSeeder::ClearTable('requests');

        PuppyRequest::create(
            array('user_id' => '3', 'breed_id' => '1', 'gender' => '1', 'age_month' => '2',
            'max_price' => '27000', 'comments' => 'Окрас: белый с рыжим', 'reply' => '0')
        );

        PuppyRequest::create(
            array('user_id' => '3', 'breed_id' => '2', 'gender' => '0', 'age_month' => '2',
            'max_price' => '25000', 'comments' => 'Окрас: черно-рыже-белый', 'reply' => '0')
        );

        PuppyRequest::create(array('user_id' => '3', 'breed_id' => '4', 'gender' => '1', 'age_month' => '2', 'reply' => '0'));
    }
}
