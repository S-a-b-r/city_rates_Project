<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_city');
            $table->string('title');
            $table->string('text');
            $table->unsignedSmallInteger('rate');
            $table->string('img');
            $table->unsignedBigInteger('id_author');
            $table->timestamps();

            $table->index('id_city', 'rates_city_idx');
            $table->index('id_author', 'rates_author_idx');

            $table->foreign('id_city','rates_city_fk')->on('cities')->references('id');
            $table->foreign('id_author','rates_author_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('rates');
    }
}
