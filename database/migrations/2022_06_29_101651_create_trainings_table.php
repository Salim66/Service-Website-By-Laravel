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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('training_category_id');
            $table->unsignedBigInteger('training_subcategory_id')->nullable();
            $table->foreign('training_category_id')->references('id')->on('training_categories')->onDelete('cascade');
            $table->foreign('training_subcategory_id')->references('id')->on('training_sub_categories')->onDelete('cascade');
            $table->string('title');
            $table->string('title_slug');
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->string('date')->nullable();
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
        Schema::dropIfExists('trainings');
    }
};
