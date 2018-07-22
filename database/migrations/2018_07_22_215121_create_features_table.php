<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('operating_system_id');
            $table->unsignedInteger('price')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('features', function ($table) {
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
        Schema::table('features', function ($table) {
            $table->dropForeign(['operating_system_id']);
        });
        Schema::dropIfExists('features');
    }
}
