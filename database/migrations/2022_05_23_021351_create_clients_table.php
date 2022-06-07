<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',99);
            $table->string('phone',11);
            $table->bigInteger('AmountDue')->nullable();
            $table->string('create_by',999);
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
