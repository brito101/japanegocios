<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('owner')->nullable();
            $table->string('phone')->nullable();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('type');
            $table->string('porpouse');
            $table->string('status')->default('Ativo');
            $table->bigInteger('views')->default(0);
            /** pricing and values */
            $table->string('sale_price')->default(0)->nullable();
            $table->string('rent_price')->default(0)->nullable();
            /** description */
            $table->longText('description')->nullable();
            $table->integer('area')->default('0');
            $table->integer('bedrooms')->default('0');
            $table->integer('bathrooms')->default('0');
            $table->integer('garage')->default('0');
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
            $table->boolean('planned_furniture')->nullable();
            $table->boolean('barbecue_grill')->nullable();
            $table->boolean('wifi')->nullable();
            $table->boolean('air_conditioning')->nullable();
            $table->boolean('bar')->nullable();
            $table->boolean('american_kitchen')->nullable();
            $table->boolean('office')->nullable();
            $table->boolean('pool')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
