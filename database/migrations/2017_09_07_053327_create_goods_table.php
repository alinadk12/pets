<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'goods', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('type_id')->unsigned();
                $table->integer('brand_id')->unsigned();
                $table->string('name_ru', 45);
                $table->string('name_en', 45);
                $table->text('description_ru');
                $table->text('description_en');
                $table->float('price')->unsigned();
                $table->string('image')->nullable();
                $table->integer('amount')->unsigned();

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('type_id')->references('id')->on('good_types')->onDelete('CASCADE')->onUpdate('CASCADE');
                $table->foreign('brand_id')->references('id')->on('brands')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('goods');
    }
}
