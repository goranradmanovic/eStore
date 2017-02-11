<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FoodSupplements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_supplements', function (Blueprint $table) {

            //Table rows
            $table->increments('id');
            $table->string('title');
            $table->string('product_link');
            $table->string('img_url');
            $table->string('description');
            $table->float('price');
            $table->string('cta_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
