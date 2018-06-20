<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'sold_goods', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('good_id')->unsigned();
                $table->integer('user_id')->unsigned();
                $table->integer('employee_id')->unsigned();
                $table->dateTime('date');

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('good_id')->references('id')->on('goods')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('sold_goods');
    }
}
