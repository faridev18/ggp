<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id('id_s');
            $table->integer('id_auteur');
            $table->string('service_name');
            $table->string('categorie');
            $table->string('service_description');
            $table->string('service_price');
            $table->string('basic_description');
            $table->string('basic_price');
            $table->string('basic_day');
            $table->string('standard_description');
            $table->string('standard_price');
            $table->string('standard_day');
            $table->string('god_description');
            $table->string('god_price');
            $table->string('god_day');
            $table->string('service_image');
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
        Schema::dropIfExists('services');
    }
}
