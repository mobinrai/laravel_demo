<?php

use App\Models\BookSale;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookSaleListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_sale_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_sale_id')->constrained();
            $table->foreignId('book_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('book_type_id')->constrained();
            $table->unsignedInteger('stock_quantity')->default('15');
            $table->decimal('marked_price', 10, 2)->nullable();
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->enum('service', ['Sale', 'Rent'])->default('Sale')->nullable();
            $table->decimal('deposit_price', 10, 2)->nullable();
            $table->integer('rental_days')->unsigned()->nullable();
            $table->enum('cover', ['Hard Cover', 'Paper Cover'])->default('Hard Cover')->nullable();
            $table->unique(['book_type_id', 'book_id', 'user_id', 'service','book_sale_id','cover'],'book_sale_list_unique');
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
        Schema::dropIfExists('book_sale_lists');
    }
}
