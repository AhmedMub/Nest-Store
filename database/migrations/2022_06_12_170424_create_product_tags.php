<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTags extends Migration
{
    // /**
    //  * Run the migrations.
    //  *
    //  * @return void
    //  */
    // public function up()
    // {
    //     Schema::create('product_tags', function (Blueprint $table) {
    //         $table->id();
    //         $table->integer('status')->default(1);
    //         $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
    //         $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
    //         $table->timestamps();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  *
    //  * @return void
    //  */
    // public function down()
    // {
    //     Schema::dropIfExists('product_tags');
    // }
}
