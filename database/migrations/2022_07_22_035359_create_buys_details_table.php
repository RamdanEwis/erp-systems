<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuysDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buys_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name',50);
            $table->string('category_id',50);
            $table->decimal('row_sub_total',12,2);
            $table->decimal('quantity',8,2)->default(0.00);
            $table->decimal('unit_price',8,2)->default(0.00);
            $table->bigInteger('invoice_number')->unsigned();
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
        Schema::dropIfExists('buys_details');
    }
}
