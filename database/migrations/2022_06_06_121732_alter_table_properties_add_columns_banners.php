<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePropertiesAddColumnsBanners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->string('photo_5', 100)->nullable();
            $table->string('photo_6', 100)->nullable();
            $table->string('photo_7', 100)->nullable();
            $table->string('photo_8', 100)->nullable();
            $table->string('photo_9', 100)->nullable();
            $table->string('photo_10', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('photo_5');
            $table->dropColumn('photo_6');
            $table->dropColumn('photo_7');
            $table->dropColumn('photo_8');
            $table->dropColumn('photo_9');
            $table->dropColumn('photo_10');
        });
    }
}
