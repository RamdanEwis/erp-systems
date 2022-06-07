<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('invoice_sales', function(Blueprint $table) {
			$table->foreign('client_id')->references('id')->on('clients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('invoice_buys', function(Blueprint $table) {
			$table->foreign('supplier_id')->references('id')->on('suppliers')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('products', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
        Schema::table('invoices',function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('invoice_buys', function(Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('invoice_sales', function(Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('invoice_buys', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('invoice_sales', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('suppliers', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('invoice_bay_products', function(Blueprint $table) {
            $table->foreign('invoice_number')->references('id')->on('invoice_buys')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
	}


	public function down()
	{
        Schema::table('invoices', function(Blueprint $table) {
            $table->dropForeign('user_id_user_id_foreign');
        });
        Schema::table('invoice_buys', function(Blueprint $table) {
            $table->dropForeign('invoice_buys_user_id_foreign');
        });
        Schema::table('invoice_sales', function(Blueprint $table) {
            $table->dropForeign('invoice_sales_user_id_foreign');
        });
        Schema::table('suppliers', function(Blueprint $table) {
            $table->dropForeign('user_id_user_id_foreign');
        });
		Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('category_id_category_id_foreign');
		});
        Schema::table('invoice_sales', function(Blueprint $table) {
            $table->dropForeign('invoice_sales_client_id_foreign');
        });
		Schema::table('invoice_buys', function(Blueprint $table) {
			$table->dropForeign('invoice_buys_supplier_id_foreign');
		});
		Schema::table('invoice_buys', function(Blueprint $table) {
			$table->dropForeign('invoice_buys_category_id_foreign');
		});
		Schema::table('invoice_sales', function(Blueprint $table) {
			$table->dropForeign('invoice_sales_category_id_foreign');
		});
        Schema::table('invoice_bay_products', function(Blueprint $table) {
            $table->dropForeign('invoice_bay_products_invoice_number_user_id_foreign');
        });
	}
}
