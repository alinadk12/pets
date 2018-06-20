<?php

use Illuminate\Database\Seeder;
use App\Breed;

class BreedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('breeds')->delete();
        DatabaseSeeder::ClearTable('breeds');

        Breed::create(
            array('name_en' => 'JACK RUSSELL TERRIER', 'height_en' => '25 - 30 cm', 'weight_en' => '6 - 8 kg',
            'description_en' => 'All jack-russel terriers of the modern type are dominated by white color, which is diluted with marks of red or black. Red spots can have different shades. The wool of these small dogs is smooth, with a broken or stiff. It still protects them well from bad weather, if the breed is used for hunting. The chest of Jack Russell Terriers is deep, but not wide. This is important when working in a burrow. The body is flexible and strong. The tail is standing upright when driving. Usually it is cut to the level of the ears. The ideal height of an adult pet is from 25 to 30 cm. The skull of these brisk hunters is flat. The transition from the forehead to the muzzle is pronounced. The muzzle narrows to the mouth.',
            'image' => 'images/breeds/1.png', 'country_id' => '1', 'name_ru' => 'ДЖЕК РАССЕЛ ТЕРЬЕР', 'height_ru' => '25 - 30 см', 'weight_ru' => '6 - 8 кг',
            'description_ru' => 'У всех джек-рассел-терьеров современного типа преобладает белый окрас, который разбавляется
            отметинами рыжего либо черного цветов. Рыжие пятна могут иметь разные оттенки. Шерсть у этих небольших собак
            бывает гладкая, с изломом либо жесткая. Она по-прежнему хорошо защищает их от непогоды, если породу используют
            на охоте. Грудь у джек-рассел-терьеров глубокая, но не широкая. Это важно при работе в норе. Тело гибкое и сильное.
             Хвост при движении стоит торчком. Обычно его купируют до уровня ушей. Идеальная высота взрослого питомца – от 25
             до 30 см. Череп у этих юрких охотников плоский. Переход ото лба к морде ярко выражен.  Мордочка сужается ко рту.')
        );

        Breed::create(
            array('name_ru' => 'БИГЛЬ', 'height_ru' => '33 - 40 см', 'weight_ru' => '8 - 14 кг',
            'description_ru' => 'Бигли – это собаки крепкого, но не грубого телосложения. В меру длинная голова смотрится мощно,
            но без признаков грубости. На ней отсутствуют складки и морщины. На куполообразном черепе средней ширины виден
            затылочный бугор. Морда не должна быть заострённой. Нос предпочтителен чёрного цвета, но у собак светлого окраса
            допускается более светлая пигментация.Глаза тёмно-карие или ореховые, крупные, но не выпуклые, с мягким выражением
            добродушного очарования. Уши имеют закруглённую форму, тонкие, грациозные, низко посаженные, свисают вниз. Корпус
            компактный с прямой спиной и гибкой поясницей. Линия живота подтянута не сильно. Хвост средней длины часто находится
             в движении, но не заворачивается за спину и не изгибается. Шерстной покров состоит из короткой густой шерсти
             одинаковой длины на всех частях тела. Особенного внимания заслуживает окрас биглей, который соответствует любому
             окрасу гончих. Обязательно наличие белого кончика хвоста. Стандартным является сочетание трёх цветов: белого,
             рыжего и чёрного, из которых составляются разные комбинации.', 'name_en' => 'BEAGLE', 'height_en' => '33 - 40 cm', 'weight_en' => '8 - 14 kg',
            'description_en' => 'Beagles are dogs of strong, but not gross build. To the extent the long head looks powerful, but without signs of rudeness. There are no wrinkles and wrinkles on it. On the domed cranium of medium width, the occiput is visible. Muzzle should not be pointed. The nose is preferable to black, but in light-colored dogs light pigmentation is allowed. The eye is dark-brown or nutty, large, but not convex, with a soft expression of good-natured charm. Ears have a rounded shape, thin, graceful, low set, hanging down. The body is compact with a straight back and a flexible loin. The line of the stomach is not tightened much. The tail of medium length is often in motion, but not wrapped behind the back and does not bend. The coat consists of a short thick wool of equal length on all parts of the body. Of particular note is the color of beagles, which corresponds to any color of hounds. Must have a white tip of the tail. The standard is a combination of three colors: white, red and black, from which are composed different combinations.', 'image' => 'images/breeds/2.png', 'country_id' => '1')
        );

        Breed::create(
            array('name_ru' => 'ЗОЛОТИСТЫЙ РЕТРИВЕР', 'height_ru' => '50 - 60 см', 'weight_ru' => '25 - 36 кг',
            'description_ru' => 'Внешний вид золотистого ретривера отличается удивительной пропорциональностью. Это красивая,
            отлично сложенная собака, активная, с уверенными движениями и дружелюбным взглядом. Голова выглядит гармонично
             по отношению к корпусу. Морда не должна быть заострённой или грубой, она широкая и глубокая, но не массивная.
             Особенного внимания заслуживает описание глаз. Они должны быть тёмно-карего цвета, с такой же тёмной обводкой,
              и обладать приятным выражением. Уши среднего размера, свисающие вниз. Посажены примерно на уровне глаз. Грудь
               мощная, с глубокими, хорошо выгнутыми рёбрами. Спина ровная, круп и хвост как бы продолжают её линию. Шерсть
               может быть прямой или слегка волнистой. Вокруг головы, начиная от ушей, и на шее, шерсть более длинная. Такая
               грива придаёт собаке добродушное выражение, которое так ценится в породе. Окрас шерсти должен быть золотистый
               или кремовый.', 'name_en' => 'GOLDEN RETRIEVER', 'height_en' => '50 - 60 см', 'weight_en' => '25 - 36 kg',
            'description_en' => 'The appearance of the golden retriever is remarkable for its proportionality. This is a beautiful, well-built dog, active, with confident movements and a friendly look. The head looks harmonious with respect to the body. Muzzle should not be pointed or rough, it is wide and deep, but not massive. Special attention is deserved by the description of the eyes. They should be dark-karogo color, with the same dark stroke, and have a pleasant expression. Ears are of medium size, hanging down. Planted approximately at eye level. The breast is powerful, with deep, well arched ribs. The back is flat, the croup and the tail seem to continue its line. The coat may be straight or slightly wavy. Around the head, starting from the ears, and around the neck, the coat is longer. This mane gives the dog a good-natured expression, which is so appreciated in the breed. Coat color should be golden or remy
.', 'image' => 'images/breeds/3.png', 'country_id' => '1')
        );

        Breed::create(
            array('name_ru' => 'ЧИХУАХУА', 'height_ru' => '15 - 23 см', 'weight_ru' => '1 - 3 кг',
            'description_ru' => 'Корпус собаки очень компактную, а череп в форме яблока — главная особенность породы. Чихуахуа
            имеет манеру очень высоко держать умеренной длины хвост.  Глаза чихуахуа крупные, округлой формы, очень
            выразительные, не выпученные, абсолютно темные. Удивительно крупные уши чихуахуа, стоячие, широко расставленные,
            широкие у основания, постепенно сужающиеся по направлению к слегка закругленным кончикам. Шея средней длины.
            Грудная клетка широкая и глубокая, ребра хорошей округлости. Лапы чихуахуа очень маленькие, овальные с хорошо
            разведенными пальцами. Умеренной длины когти очень выпуклые. Подушечки хорошо развиты и очень эластичны. ', 'name_en' => 'CHIHAUHAUA', 'height_en' => '15 - 23 cm', 'weight_en' => '1 - 3 kg',
            'description_en' => 'The body of the dog is very compact, and the apple-shaped skull is the main feature of the breed. Chihuahua has a very high manner to keep a moderate-length tail. Chihuahua\'s eyes are large, round in shape, very expressive, not bulging, absolutely dark. Surprisingly large chihuahua ears, standing, widely spaced, wide at the base, gradually tapering towards slightly rounded tips. Neck of medium length. Chest wide and deep, ribs of good roundness. Chihuahua\'s paws are very small, oval with well-groomed fingers. Moderate length of claws very prominent. Pads well developed and very elastic. ',
            'image' => 'images/breeds/4.png', 'country_id' => '2')
        );
    }
}
