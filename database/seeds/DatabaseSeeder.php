<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BrandNamesTableSeeder::class);
        $this->call(GoodTypesTableSeeder::class);
        $this->call(GoodsTableSeeder::class);
        $this->call(SoldGoodsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(BreedsTableSeeder::class);
        $this->call(DogsTableSeeder::class);
        $this->call(PuppiesTableSeeder::class);
        $this->call(SoldPuppiesTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(RequestsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);

        Model::reguard();
    }

    public static function ClearTable($table)
    {
        DB::table($table)->delete();
        DB::statement("ALTER TABLE {$table} AUTO_INCREMENT = 1");
    }
}
