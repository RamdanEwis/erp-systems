<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceSalesTable extends Migration {

	public function up()
	{
		Schema::create('invoice_sales', function(Blueprint $table) {
			$table->bigIncrements('id');
            $table->bigInteger('client_id')->unsigned();
            $table->decimal('total',8,2);
            $table->bigInteger('user_id')->unsigned();
            $table->integer('status')->default(0);
            $table->date('invoice_date');
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('invoice_sales');
	}
}
