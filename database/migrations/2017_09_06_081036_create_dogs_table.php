<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'dogs', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('breed_id')->unsigned();
                $table->string('name_ru', 30);
                $table->string('name_en', 30);
                $table->boolean('gender');
                $table->date('birthdate');
                $table->string('color_ru', 45);
                $table->string('color_en', 45);
                $table->text('description_ru');
                $table->text('description_en');
                $table->string('image');

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('breed_id')->references('id')->on('breeds')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('dogs');
    }
}
