<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignUsersToIncomes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incomes', function (Blueprint $table) {
            $table->bigInteger('id_user')->unsigned()->change();
            $table->foreign('id_user', 'incomes_id_user_foreign')->references('id')->on('users')->onDelete('cascade');
            // klucz obcy 'user_id' tabeli 'incomes' będzie się odwoływał do klucza obcego 'id' tabeli 'users' i "usuń jeśli nie ma"
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
