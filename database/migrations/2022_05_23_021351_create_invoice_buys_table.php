<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceBuysTable extends Migration {

	public function up()
	{
		Schema::create('invoice_buys', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('product',50);
            $table->bigInteger('category_id')->unsigned();
            $table->string('number_product');
            $table->bigInteger('supplier_id')->unsigned();
            $table->bigInteger('price_buy')->unsigned();
            $table->decimal('total',12,2);
            $table->string('status',50)->default('غير مدفوعه');
            $table->integer('value_status');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('invoice_number');
            $table->date('invoice_date');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('invoice_buys');
	}
}
