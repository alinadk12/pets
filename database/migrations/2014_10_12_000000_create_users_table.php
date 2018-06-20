<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('surname', 45);
                $table->string('name', 45);
                $table->string('patronymic', 45)->nullable();
                $table->string('email', 45)->unique();
                $table->string('login', 15)->unique();
                $table->string('password', 80);
                $table->string('phone_number', 30);
                $table->string('image')->nullable();

                $table->rememberToken();
                $table->timestamps();
                $table->softDeletes();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
