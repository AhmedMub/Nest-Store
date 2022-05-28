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

            /*
                category should not be as foreign key
            */

            //product default fields
            $table->id();

            //set to null in case the created user has been removed from admins
            $table->foreignId('createdBy_adminID')->nullable()->references('id')->on('admins')->onDelete('set null');
            $table->integer('updatedBy_adminID');
            $table->integer('product_status')->default(1);
            $table->integer('category_id');
            $table->integer('subCategory_id');
            $table->integer('subSubCategory_id')->default(0);
            $table->integer('vendor_id');
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
