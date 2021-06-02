<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basements', function (Blueprint $table) {
            $table->id();
            $table->integer('count')->unsigned();
            $table->float('price')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->timestamp('arrival')->nullable();
            $table->timestamp('expire')->nullable();
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
        Schema::dropIfExists('basements');
    }
}
