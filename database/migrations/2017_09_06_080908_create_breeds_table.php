<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'breeds', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('country_id')->unsigned();
                $table->string('name_ru', 30);
                $table->string('name_en', 30);
                $table->string('height_ru', 30);
                $table->string('height_en', 30);
                $table->string('weight_ru', 30);
                $table->string('weight_en', 30);
                $table->text('description_ru');
                $table->text('description_en');
                $table->string('image');

                $table->timestamps();

                $table->foreign('country_id')->references('id')->on('countries')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('breeds');
    }
}
