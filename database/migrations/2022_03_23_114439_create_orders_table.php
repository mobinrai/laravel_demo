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
            $table->foreignId('user_id')->constrained();
            $table->foreignId('billing_id')->constrained();
            $table->foreignId('shipping_id')->constrained();
            $table->decimal('shipping_amount', 10, 2)->nullable();
            $table->decimal('shipping_amount_additional', 10, 2)->nullable();
            $table->decimal('discount_offer', 10, 2)->nullable();
            $table->decimal('loyalty_discount', 10, 2)->nullable();
            $table->decimal('membership_discount', 10, 2)->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->enum('status', ['Pending', 'Processing', 'Dispatched', 'Delivered', 'Cancelled'])->default('Pending');
            $table->enum('payment_status', ['Paid', 'Unpaid'])->default('Unpaid');
            $table->string('payment_method');
            $table->string('order_code');
            $table->string('transaction_id');
            $table->string('total_items');
            $table->longText('order_notes')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
