<?php

use Illuminate\Database\Seeder;
use App\Good;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('goods')->delete();
        DatabaseSeeder::ClearTable('goods');

        Good::create(
            array(
            'name_ru' => 'Корм сухой Royal Canin "X-Small Junior"',
            'name_en' => 'Fodder dry Royal Canin "X-Small Junior"',
            'type_id' => '1',
            'brand_id' => '3',
            'description_ru' => 'для щенков миниатюрных размеров от 2 до 10 месяцев, 1,5 кг',
            'description_en' => 'for puppies of miniature sizes from 2 to 10 months, 1.5 kg',
            'price' => '669',
            'image' => 'images/goods/feed/royal canin.png',
            'amount' => '10')
        );

        Good::create(
            array(
            'name_ru' => 'Корм сухой Pedigree',
            'type_id' => '1',
            'name_en' => 'Fodder dry Pedigree',
            'brand_id' => '2',
            'description_ru' => 'для щенков всех пород, с курицей, 13 кг',
            'description_en' => 'for puppies of all breeds, with chicken, 13 kg',
            'price' => '1494',
            'image' => 'images/goods/feed/pedigree.png',
            'amount' => '7')
        );

        Good::create(
            array('name_ru' => 'Корм сухой GO!', 'name_en' => 'Fodder dry GO!', 'type_id' => '1', 'brand_id' => '1',
            'description_ru' => 'для щенков и собак, с лососем и овсянкой, 5.44 кг', 'description_en' => 'for puppies and dogs, with salmon and oatmeal, 5.44 kg', 'price' => '2089',
            'image' => 'images/goods/feed/go.png', 'amount' => '6')
        );

        Good::create(
            array('name_ru' => 'Ошейник Аркон "Стандарт"', 'name_en' => 'Collar Arkon "Standard"', 'type_id' => '4', 'brand_id' => '4',
            'description_ru' => 'цвет: черный, ширина 1,4 см, длина 32 см', 'description_en' => 'color: black, width 1.4 cm, length 32 cm', 'price' => '71',
            'image' => 'images/goods/accessories/collar.png', 'amount' => '6')
        );

        Good::create(
            array('name_ru' => 'Поводок-цепь "V.I.Pet"', 'name_en' => 'Chain-leash "V.I.Pet"', 'type_id' => '4', 'brand_id' => '5',
            'description_en' => 'with handle, 4 mm, 110 cm', 'price' => '499', 'image' => 'images/goods/accessories/lead1.png',
            'description_ru' => ' ',
            'amount' => '5')
        );

        Good::create(
            array('name_ru' => 'Поводок капроновый для собак "Аркон"', 'name_en' => 'Leash nylon for dogs "Arkon"', 'type_id' => '4',
            'brand_id' => '4', 'description_ru' => 'цвет: фиолетовый, ширина 1,5 см, длина 3 м', 'description_en' => 'color: purple, width 1.5 cm, length 3 m', 'price' => '235',
            'image' => 'images/goods/accessories/lead2.png', 'amount' => '8')
        );

        Good::create(
            array('name_ru' => 'Игрушка для собак "Массажный мяч"', 'name_en' => 'Toy for dogs "Massage ball"
', 'type_id' => '3', 'brand_id' => '5', 'description_ru' => ' цвет: красный, диаметр: 7 см, материал: ПВХ', 'description_en' => 'color: red, diameter: 7 cm, material: PVC ', 'price' => '149',
            'image' => 'images/goods/toys/ball.png', 'amount' => '10')
        );

        Good::create(
            array('name_ru' => 'Игрушка для собак "Кабанчик"', 'name_en' => 'Toy for the dogs "Kabanchik"', 'type_id' => '3', 'brand_id' => '5',
            'description_ru' => 'цвет: зеленый, материал: латекс', 'price' => '201', 'description_en' => 'color: green, material: latex', 'price' => '201', 'image' => 'images/goods/toys/boar.png',
            'amount' => '4')
        );

        Good::create(
            array('name_ru' => 'Миска для животных "V.I.Pet"', 'name_en' => 'Bowl for animals "V.I.Pet"', 'type_id' => '2', 'brand_id' => '5',
            'description_ru' => 'складная, цвет: серый, 660 мл, материал: силикон', 'description_en' => 'folding, color: gray, 660 ml, material: silicone', 'price' => '519',
            'image' => 'images/goods/bowls/bowl1.png', 'amount' => '7')
        );

        Good::create(
            array(
            'name_ru' => 'Миска для животных "Disney Pluto"', 
            'name_en' => 'Миска для животных "Disney Pluto"', 
            'type_id' => '2', 
            'brand_id' => '6',
            'description_ru' => '450 мл, материал: Нержавеющая сталь', 
            'description_en' => '450 ml, Material: Stainless steel, Plastic, Rubber', 
            'price' => '355',
            'image' => 'images/goods/bowls/bowl2.png', 
            'amount' => '3')
        );

        Good::create(
            array(
            'name_ru' => 'Переноска пластиковая "Triol"', 
            'type_id' => '5', 
            'name_en' => 'Plastic carrying case "Triol"', 
            'type_id' => '5', 
            'brand_id' => '6',
            'description_ru' => 'с замком, цвет: синий, 480 х 290 х 280 мм, материал: Металл, Пластик', 
            'description_en' => 'with lock, color: blue, 480 x 290 x 280 mm, material: Metal, Plastic', 
            'price' => '1389',
            'image' => 'images/goods/carries/carry.png', 
            'amount' => '3')
        );

    }
}
