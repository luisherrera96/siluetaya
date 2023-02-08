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
        Schema::create('about_users', function (Blueprint $table) {
            $table->id();
            $table->string('abo_name');
            $table->string('abo_age');
            $table->string('abo_gender');
            $table->string('abo_size');
            $table->string('abo_weigth');
            $table->string('abo_score');
            $table->string('abo_points');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_users');
    }
};
