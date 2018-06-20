<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldPuppiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'sold_puppies', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('puppy_id')->unsigned();
                $table->integer('user_id')->unsigned();
                $table->integer('employee_id')->unsigned();
                $table->dateTime('date');

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('puppy_id')->references('id')->on('puppies')->onDelete('CASCADE')->onUpdate('CASCADE');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
                $table->foreign('employee_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('sold_puppies');
    }
}
