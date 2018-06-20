<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('roles')->delete();
        DatabaseSeeder::ClearTable('roles');

        Role::create(array('name' => 'Администратор'));
        Role::create(array('name' => 'Сотрудник'));
        Role::create(array('name' => 'Пользователь'));
    }
}
