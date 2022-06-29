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
        Schema::create('training_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('training_category_id');
            $table->foreign('training_category_id')->references('id')->on('training_categories')->onDelete('cascade');
            $table->string('training_subcategory_name');
            $table->string('training_subcategory_slug');
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
        Schema::dropIfExists('training_sub_categories');
    }
};
