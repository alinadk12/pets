<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuppiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'puppies', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('breed_id')->unsigned();
                $table->date('birthdate');
                $table->boolean('gender');
                $table->string('color_ru', 45);
                $table->string('color_en', 45);
                $table->mediumText('notes_ru')->nullable();
                $table->mediumText('notes_en')->nullable();
                $table->integer('male_id')->unsigned();
                $table->integer('female_id')->unsigned();
                $table->string('image');
                $table->float('price')->unsigned();

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('breed_id')->references('id')->on('breeds')->onDelete('CASCADE')->onUpdate('CASCADE');
                $table->foreign('male_id')->references('id')->on('dogs')->onDelete('CASCADE')->onUpdate('CASCADE');
                $table->foreign('female_id')->references('id')->on('dogs')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('puppies');
    }
}
