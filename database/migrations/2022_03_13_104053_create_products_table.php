<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('status')->default('Ativo');
            $table->bigInteger('views')->default(0);
            /** pricing and values */
            $table->string('sale_price')->default(0)->nullable();
            /** description */
            $table->longText('description')->nullable();
            /** photo */
            $table->string('photo_0', 100)->nullable();
            $table->string('photo_1', 100)->nullable();
            $table->string('photo_2', 100)->nullable();
            $table->string('photo_3', 100)->nullable();
            $table->string('photo_4', 100)->nullable();
            /** pattern */
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
