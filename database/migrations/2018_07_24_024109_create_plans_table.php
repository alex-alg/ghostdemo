<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('operating_system_id')->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('plans', function ($table) {
            $table->foreign(['operating_system_id'])->references('id')->on('operating_systems');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropForeign(['operating_system_id']);
        });
        Schema::dropIfExists('plans');
    }
}
