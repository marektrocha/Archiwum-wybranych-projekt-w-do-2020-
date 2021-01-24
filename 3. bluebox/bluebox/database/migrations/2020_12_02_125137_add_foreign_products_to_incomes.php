<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignProductsToIncomes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incomes', function (Blueprint $table) {
            $table->bigInteger('id_product')->unsigned()->change();
            $table->foreign('id_product', 'incomes_id_product_foreign')->references('id')->on('products')->onDelete('cascade');
            // klucz obcy 'id_product' tabeli 'incomes' będzie się odwoływał do klucza obcego 'id' tabeli 'products' i "usuń jeśli nie ma"
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incomes', function (Blueprint $table) {
            //
        });
    }
}
