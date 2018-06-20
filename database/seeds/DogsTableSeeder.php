<?php

use Illuminate\Database\Seeder;
use App\Dog;

class DogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('dogs')->delete();
        DatabaseSeeder::ClearTable('dogs');

        Dog::create(
            array(
            'breed_id' => '1','name_ru' => 'Ника','color_ru' => 'Белый с рыжим', 'description_ru' => 'Ника - самое ласковое существо в доме. Добродушный покладистый
            характер и кукольная внешность не оставят Вас равнодушными. Но все-таки это терьер и охотничьи инстинкты не
            забыты. В играх проявляет сообразительность и фантазию. Не страшно если ей не с кем поиграть, она найдет
            чем себя занять, не в ущерб домашнему порядку.', 'name_en' => 'Nika', 'gender' => '0', 'birthdate' => '2012-10-15',
            'color_en' => 'White with red', 'description_en' => 'Nika is the most affectionate creature in the house. A good-tempered and agreeable character and a puppet appearance will not leave you indifferent. But all the same this terrier and hunting instincts are not forgotten. In games he shows ingenuity and imagination. Do not be afraid if she does not have anyone to play with, she will find something to do herself, not at the expense of home order.', 'image' => 'images/dogs/nika.png')
        );

        Dog::create(
            array('breed_id' => '1','name_ru' => 'Кеша', 'color_ru' => 'Белый с рыжим', 'description_ru' => 'Кеша - очень подвижный, любознательный, игривый терьер.
            Несмотря на короткие лапы, очень резвый и прыгучий. Недюжий ум проявляет во всем. Сообразительный и
            интеллектуально развитый терьер, готовый приступить к охоте в любое время. Очень дружелюбный и ласковый,
            настоящий друг и компаньон.', 'name_en' => 'Kesha', 'gender' => '1', 'birthdate' => '2013-05-26',
            'color_en' => 'White with red', 'description_en' => 'Kesha is a very mobile, inquisitive, playful terrier. Despite the short paws, very quick and jumping. The remarkable mind shows in everything. A smart and intellectually developed terrier, ready to start hunting anytime. Very friendly and affectionate, real friend and companion.', 'image' => 'images/dogs/kesha.png')
        );

        Dog::create(
            array('breed_id' => '4','name_ru' => 'Кэти','color_ru' => 'Рыжий', 'description_ru' => 'Необыкновенно нежная и ласковая девочка. Сообразительна, немного хитровата.
            С удовольствием поддержит приглашение поиграть, всегда доброжелательна. Абсолютно несуетлива и неназойлива.
            Большая любительница длительных прогулок. Умеет улыбаться и когда делает это, прищуривает глазки, как кошка на солнце.', 'name_en' => 'Katie', 'gender' => '0', 'birthdate' => '2014-04-08',
            'color_en' => 'Red', 'description_en' => 'Extraordinarily tender and affectionate girl. Smart, a bit cunning. I am pleased to support the invitation to play, always benevolent. Absolutely non-wearisome and non-intrusive. A great lover of long walks. He knows how to smile and when he does this, he squints his eyes like a cat in the sun.',
            'image' => 'images/dogs/katy.png')
        );

        Dog::create(
            array('breed_id' => '4','name_ru' => 'Джерри','color_ru' => 'Рыжий', 'description_ru' => 'Любимчик всего питомника, подкупающий своей обезоруживающе-открытой улыбкой,
            покладистостью характера, желанием поддержать любую игру и нежностью и лаской по отношению к своей стае.
            Так же Джерри большой любитель мягких подушек. А уж, понежиться на диванчике из наилучших занятий.', 'name_en' => 'Jerry', 'gender' => '1', 'birthdate' => '2013-09-24',
            'color_en' => 'Red', 'description_en' => 'The pet of the whole kennel, bribing his disarmingly-open smile, complaisance of character, the desire to support any game and tenderness and affection towards his sta.Es same Jerry is a fan of soft pillows. And, to luxuriate on a sofa from the best lessons.',
            'image' => 'images/dogs/jerry.png')
        );

        Dog::create(
            array('breed_id' => '2','name_ru' => 'Сакура','color_ru' => 'Черно-рыже-белый', 'description_ru' => 'Сакура хорошо воспитанная , очень спокойная , уравновешенная
            собака. Она прекрасная, заботливая мама. Не агрессивная. Дружелюбна к людям и к собакам. Миролюбивая со всеми животными.
            Выставлялась 4 раза, не считая  двух щенячьих выходов.  И,  все 4 раза получила титулы!', 'name_en' => 'Sakura', 'gender' => '0', 'birthdate' => '2014-12-17',
            'color_en' => 'Black-red-white', 'description_en' => 'Sakura is a well-bred, very calm, balanced dog. She is a beautiful, caring mother. Not aggressive. Friendly to people and dogs. Peaceful with all animals. Exhibited 4 times, not counting two puppy outputs.  И,  все 4 раза получила титулы!', 'image' => 'images/dogs/sakura.png')
        );

        Dog::create(
            array('breed_id' => '2', 'name_ru' => 'Ватсон','color_ru' => 'Черно-рыже-белый', 'description_ru' => 'Спокойный, гордый, умный и нежный. Умеет быть весёлым, бывает задумчивым.
             Может обижаться, но отходчив. Честный, если виноват, не будет убегать и прятаться. Любопытен. Доброжелателен,
             но не назойлив. Сам себе-хозяин. В нём чувствуется достоинство, несмотря на юный возраст, запросто может
             дать отпор более сильному противнику, если тот переступил грань дозволенного.','name_en' => 'Watson', 'gender' => '1', 'birthdate' => '2015-01-31',
            'color_en' => 'Black-red-white', 'description_en' => 'Calm, proud, intelligent and gentle. He is able to be cheerful, sometimes thoughtful. Can take offense, but is quick-witted. Honest, if guilty, will not run and hide. Curious. Benevolent, but not intrusive. Himself a master. It feels dignity, despite the young age, can easily repel a stronger opponent, if he crossed the line of permissible.', 'image' => 'images/dogs/vatson.png')
        );

        Dog::create(
            array('breed_id' => '3','name_ru' => 'Джесси', 'color_ru' => 'Золотистый', 'description_ru' => 'Джесси самоуверенная, очень ласковая в семье, но недоверчивая с посторонними,
            самостоятельная, спокойная, целеустремленная. Классная охранница! Могла бы быть агрессивной и к людям и к собакам,
            но не позволяет воспитание.',  'name_en' => 'Jesse', 'gender' => '0', 'birthdate' => '2014-06-05',
            'color_en' => 'Golden', 'description_en' => 'Jesse is self-confident, very affectionate in the family, but incredulous with strangers, independent, calm, purposeful. Great security guard! I could be aggressive towards people and dogs,
            но не позволяет воспитание.', 'image' => 'images/dogs/jessy.png')
        );

        Dog::create(
            array('breed_id' => '3','name_ru' => 'Тёма','color_ru' => 'Золотистый', 'description_ru' => 'Тёма  послушный, невозмутимый, доброжелательный, общительный.  Обладает
            огромым чувством собственного достоинства, немного высокомерен. У него отличный характер , не агрессивен  к людям и животным,
            если те не агрессивны к нему.', 'name_en' => 'Artem', 'gender' => '1', 'birthdate' => '2013-04-19',
            'color_en' => 'Золотистый', 'description_en' => 'Artem obedient, unruffled, benevolent, sociable. Has a huge sense of self-worth, a bit arrogant. He has a great character, is not aggressive towards humans and animals, if they are not aggressive towards him.', 'image' => 'images/dogs/tema.png')
        );
    }
}
