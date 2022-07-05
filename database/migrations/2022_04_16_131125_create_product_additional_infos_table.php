<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAdditionalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_additional_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('stand_up_en')->nullable();
            $table->string('stand_up_ar')->nullable();
            $table->string('folded_en')->nullable();
            $table->string('folded_ar')->nullable();
            $table->string('frame_en')->nullable();
            $table->string('frame_ar')->nullable();
            $table->string('color_en')->nullable();
            $table->string('color_ar')->nullable();
            $table->string('size_en')->nullable();
            $table->string('size_ar')->nullable();
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
        Schema::dropIfExists('product_additional_infos');
    }
}
