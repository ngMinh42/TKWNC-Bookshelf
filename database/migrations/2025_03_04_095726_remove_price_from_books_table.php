<?php
// database/migrations/*_remove_price_from_books_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemovePriceFromBooksTable extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->nullable();
        });
    }
}
