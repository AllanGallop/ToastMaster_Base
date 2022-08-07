<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_locations', function (Blueprint $table) {
            $table->id();
            $table->string('Address_1');
            $table->string('Address_2')->nullable();
            $table->string('Address_3')->nullable();
            $table->string('City')->nullable();
            $table->string('Postcode')->nullable();
            $table->string('County')->nullable();
            $table->string('Country')->nullable();
            $table->string('Tel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_locations');
    }
};
