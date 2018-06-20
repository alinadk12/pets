<?php

use Illuminate\Database\Seeder;
use App\News;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('news')->delete();
        DatabaseSeeder::ClearTable('news');

        News::create(
            array('user_id' => '1', 'date' => '2016-11-06 13:05:00', 'title_en' => 'The chihuahua puppies turned 2 months old!','title_ru' => 'Щенкам чихуахуа исполнилось 2 месяца!', 'text_ru' => 'Праздник ознаменовался выдачей новых игрушек, поеданием новой еды и обрезанием когтей,
            которые растут с какой-то неимоверной скоростью. Дети довольны всем, кроме последней процедуры...','text_en' => 'The holiday was marked by the issuance of new toys, eating new food and cutting claws, which grow with some incredible speed. Children are happy with everything except the last procedure ...',
            'image' => 'images/news/news1.png')
        );

        News::create(
            array('user_id' => '1', 'date' => '2016-11-16 13:05:00', 'title_ru' => 'Родились щенки Джек Рассел терьера!','title_en' => 'Born puppies Jack Russell Terrier!',
            'text_ru' => '13 ноября 2016 г был для нашего питомника праздничным днем! Ника преподнесла подарок в виде 5 маленьких щенков. Кеша - отец щенков. У нас (вернее у Ники с Кешей) получилось 2 мальчика и 3 девочки. Счастью нет предела!!!',
            'text_en' => 'November 13, 2016 was for our kennel a holiday! Nika presented a gift in the form of 5 small puppies. Kesha is the father of puppies. We (or rather, Nicky with Kesha) got 2 boys and 3 girls. Fortunately there is no limit !!!',
            'image' => 'images/news/news2.png')
        );
    }
}
