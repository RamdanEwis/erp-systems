<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceBuysTable extends Migration {

	public function up()
	{
		Schema::create('invoice_buys', function(Blueprint $table) {
			$table->bigIncrements('id');
            $table->bigInteger('supplier_id')->unsigned();
            $table->decimal('total',12,2)->default(0.00);
            $table->bigInteger('user_id')->unsigned();
            $table->date('invoice_date');
            $table->integer('status')->default(0);
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('invoice_buys');
	}
}
