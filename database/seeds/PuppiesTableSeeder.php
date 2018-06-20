<?php

use Illuminate\Database\Seeder;
use App\Puppy;

class PuppiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('puppies')->delete();
        DatabaseSeeder::ClearTable('puppies');

        Puppy::create(
            array('breed_id' => '3', 'birthdate' => '2016-06-04', 'gender' => '1', 'color_ru' => 'Золотистый','color_en' => 'Golden',
            'notes_ru' => 'вес: 560 грамм, без отклонений',  'notes_en' => ' weight: 560 grams, without deviations','male_id' => '8', 'female_id' => '7',
            'image' => 'images/puppies/golden retrievers/2016-06-04/male1.png', 'price' => '26000')
        );

        Puppy::create(
            array('breed_id' => '3', 'birthdate' => '2016-06-04', 'gender' => '1', 'color_ru' => 'Золотистый','color_en' => 'Golden',
            'notes_ru' => 'вес: 540 грамм, без отклонений','notes_en' => ' weight: 540 grams, without deviations', 'male_id' => '8', 'female_id' => '7',
            'image' => 'images/puppies/golden retrievers/2016-06-04/male2.png', 'price' => '26000')
        );

        Puppy::create(
            array('breed_id' => '3', 'birthdate' => '2016-06-04', 'gender' => '0', 'color_ru' => 'Золотистый','color_en' => 'Golden',
            'notes_ru' => 'вес: 550 грамм, без отклонений','notes_en' => ' weight: 550 grams, without deviations', 'male_id' => '8', 'female_id' => '7',
            'image' => 'images/puppies/golden retrievers/2016-06-04/female1.png', 'price' => '28000')
        );

        Puppy::create(
            array('breed_id' => '1', 'birthdate' => '2016-11-16', 'gender' => '1', 'color_ru' => 'Белый с рыжим','color_en' => 'White with red',
            'notes_ru' => 'вес: 182 грамма, без отклонений','notes_en' => ' weight: 182 grams, without deviations', 'male_id' => '2', 'female_id' => '1',
            'image' => 'images/puppies/jack russell terriers/2016-11-16/male1.png', 'price' => '24000')
        );

        Puppy::create(
            array('breed_id' => '1', 'birthdate' => '2016-11-16', 'gender' => '1', 'color_ru' => 'Белый с рыжим','color_en' => 'White with red',
            'notes_ru' => 'вес: 187 грамм, без отклонений','notes_en' => ' weight: 187 grams, without deviations', 'male_id' => '2', 'female_id' => '1',
            'image' => 'images/puppies/jack russell terriers/2016-11-16/male2.png', 'price' => '25000')
        );

        Puppy::create(
            array('breed_id' => '1', 'birthdate' => '2016-11-16', 'gender' => '0', 'color_ru' => 'Белый с рыжим','color_en' => 'White with red',
            'notes_ru' => 'вес: 178 грамм, без отклонений', 'notes_en' => ' weight: 178 grams, without deviations','male_id' => '2', 'female_id' => '1',
            'image' => 'images/puppies/jack russell terriers/2016-11-16/female1.png', 'price' => '22000')
        );

        Puppy::create(
            array('breed_id' => '1', 'birthdate' => '2016-11-16', 'gender' => '0', 'color_ru' => 'Белый с рыжим','color_en' => 'White with red',
            'notes_ru' => 'вес: 166 грамм, без отклонений','notes_en' => ' weight: 166 grams, without deviations', 'male_id' => '2', 'female_id' => '1',
            'image' => 'images/puppies/jack russell terriers/2016-11-16/female2.png', 'price' => '24000')
        );

        Puppy::create(
            array('breed_id' => '1', 'birthdate' => '2016-11-16', 'gender' => '0', 'color_ru' => 'Белый с рыжим','color_en' => 'White with red',
            'notes_ru' => 'вес: 171 грамм, без отклонений','notes_en' => ' weight: 171 grams, without deviations', 'male_id' => '2', 'female_id' => '1',
            'image' => 'images/puppies/jack russell terriers/2016-11-16/female3.png', 'price' => '23000')
        );
    }
}
