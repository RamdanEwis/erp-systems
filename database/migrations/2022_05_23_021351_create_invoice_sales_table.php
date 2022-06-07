<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceSalesTable extends Migration {

	public function up()
	{
		Schema::create('invoice_sales', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->integer('number_product');
			$table->unsignedBigInteger('client_id')->unsigned();
			$table->unsignedBigInteger('price_sale')->unsigned();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('category_id');
            $table->decimal('total',8,2);
            $table->string('status',50)->default(1);
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('invoice_number');
            $table->date('invoice_date');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('invoice_sales');
	}
}
