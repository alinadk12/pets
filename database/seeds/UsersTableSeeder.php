<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('role_user')->delete();
        //DB::table('users')->delete();
        DatabaseSeeder::ClearTable('role_user');
        DatabaseSeeder::ClearTable('users');

        $admin = User::create(
            array('surname' => 'Администратор', 'name' => 'Сайта', 'email' => 'admin@ya.ru',
            'phone_number' => '9878765434', 'login' => 'admin', 'password' => bcrypt('admin'))
        );

        $admin->roles()->attach(1);

        $employee = User::create(
            array('surname' => 'Сотрудник', 'name' => 'Питомника', 'email' => 'employee@ya.ru',
            'phone_number' => '968945212', 'login' => 'employee', 'password' => bcrypt('employee'))
        );
        $employee->roles()->attach(2);

        $user = User::create(
            array('surname' => 'Пользователь', 'name' => 'Обычный', 'email' => 'user@ya.ru',
            'phone_number' => '934943020', 'login' => 'user', 'password' => bcrypt('user'))
        );
        $user->roles()->attach(3);
    }
}
