<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceBayProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_bay_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product',50);
            $table->string('number_product');
            $table->integer('price_buy');
            $table->decimal('total_row',12,2);
            $table->bigInteger('invoice_number')->unsigned();
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_bay_products');
    }
}
