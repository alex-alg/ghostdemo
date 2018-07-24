<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('feature_id')->index();
            $table->unsignedInteger('plan_id')->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('feature_plan', function ($table) {
            $table->foreign(['feature_id'])->references('id')->on('features');
            $table->foreign(['plan_id'])->references('id')->on('plans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('feature_plan', function (Blueprint $table) {
            $table->dropForeign(['feature_id']);
            $table->dropForeign(['plan_id']);
        });
        Schema::dropIfExists('feature_plan');
    }
}
