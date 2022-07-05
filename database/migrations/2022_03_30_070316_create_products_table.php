<?php

use Faker\Provider\ar_EG\Color;
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

            //set to null in case the created user has been removed from admins
            $table->foreignId('createdBy_adminID')->nullable()->references('id')->on('admins')->onDelete('set null');
            $table->foreignId('updatedBy_adminID')->nullable()->references('id')->on('admins')->onDelete('set null');
            $table->integer('product_status')->default(1);
            $table->foreignId('category_id')->nullable()->references('id')->on('categories')->onDelete('set null');
            $table->foreignId('subCategory_id')->nullable()->references('id')->on('sub_categories')->onDelete('set null');
            $table->foreignId('subSubCategory_id')->nullable()->references('id')->on('sub_subcategories')->onDelete('set null');
            $table->foreignId('vendor_id')->nullable()->references('id')->on('vendors')->onDelete('set null');
            $table->string('name_en')->unique();
            $table->string('name_ar')->unique();
            $table->string('slug');

            //Stock keeping unit
            $table->string('sku');

            $table->integer('qty');
            $table->integer('price');
            $table->integer('size')->nullable();
            $table->string('hot_deals')->default(0);
            $table->string('new_deals')->default(1);
            $table->string('type');

            // written abbreviation for manufacturing date
            $table->string('mfg');

            //show description
            $table->integer('desc_status')->default(1);

            //show Discount
            $table->integer('discount_status')->default(1);

            //show Additional Information
            $table->integer('additionalInfo_status')->default(1);

            //show Vendor
            $table->integer('vendor_status')->default(1);

            //show reviews
            $table->integer('reviews_status')->default(1);

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
