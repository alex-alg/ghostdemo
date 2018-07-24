<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropOsIdFromFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('features', function (Blueprint $table) {
            $table->dropForeign(['operating_system_id']);
            $table->dropColumn('operating_system_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('features', function (Blueprint $table) {
            $table->unsignedInteger('operating_system_id');
            $table->foreign(['operating_system_id'])->references('id')->on('operating_systems');
        });
    }
}
