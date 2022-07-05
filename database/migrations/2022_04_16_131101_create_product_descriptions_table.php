<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_descriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->text('short_desc_en');
            $table->text('short_desc_ar');
            $table->text('long_desc_en')->nullable();
            $table->text('long_desc_ar')->nullable();
            $table->text('packaging_delivery_en')->nullable();
            $table->text('packaging_delivery_ar')->nullable();
            $table->text('suggested_use_en')->nullable();
            $table->text('suggested_use_ar')->nullable();
            $table->text('other_ingredients_en')->nullable();
            $table->text('other_ingredients_ar')->nullable();
            $table->text('warnings_en')->nullable();
            $table->text('warnings_ar')->nullable();
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
        Schema::dropIfExists('product_descriptions');
    }
}
