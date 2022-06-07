<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuppliersTable extends Migration {

	public function up()
	{
		Schema::create('suppliers', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->timestamps();
			$table->string('name',99);
			$table->bigInteger('AmountDue')->nullable();
            $table->bigInteger('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('suppliers');
	}
}
