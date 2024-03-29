<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->integer('status');
            $table->integer('cancel_request')->default(0);
            $table->text('address');
            $table->text('addressTwo')->nullable();
            $table->string('district');
            $table->string('area');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->integer('postal_code');
            $table->bigInteger('phone');
            // if cash value will be 0 | if online value will be 1
            $table->smallInteger('payment_method');
            $table->float('amount', 8, 2);
            $table->float('shipping_fees', 8, 2);
            $table->float('subtotal', 8, 2);
            $table->text('additional_info')->nullable();
            $table->integer('transaction_id')->nullable();
            $table->text('invoice_no')->nullable();
            $table->string('currency')->nullable();
            $table->date('shipping_date')->nullable();
            $table->date('delivered_date')->nullable();
            $table->date('canceled_date')->nullable();
            $table->text('canceled_reason')->nullable();
            $table->float('discounted_coupon', 8, 2)->nullable();
            $table->integer('coupon_discount_percentage')->nullable();
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
        //DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('orders');
        //DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
