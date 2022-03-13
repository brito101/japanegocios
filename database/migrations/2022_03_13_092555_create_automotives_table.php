<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutomotivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automotives', function (Blueprint $table) {
            $table->id();
            $table->string('owner')->nullable();
            $table->string('phone')->nullable();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('category'); //carro, moto etc
            $table->string('brand'); //marca
            $table->string('model');
            $table->string('status')->default('active');
            $table->bigInteger('views')->default(0);
            /** pricing and values */
            $table->string('sale_price')->default(0)->nullable();
            /** description */
            $table->longText('description')->nullable();
            $table->integer('year')->nullable();
            $table->integer('mileage')->nullable();
            /** address */
            $table->string('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            /** photo */
            $table->string('photo', 100)->nullable();
            /** structure */
            $table->string('gear')->nullable();
            $table->string('fuel')->nullable();
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
        Schema::dropIfExists('automotives');
    }
}
