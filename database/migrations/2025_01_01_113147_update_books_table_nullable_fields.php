<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBooksTableNullableFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('ISBN_10')->nullable()->default(null)->change();
            $table->string('ISBN_13')->nullable()->default(null)->change();
            $table->string('author')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('ISBN_10')->nullable(false)->default('')->change();
            $table->string('ISBN_13')->nullable(false)->default('')->change();
            $table->string('author')->nullable(false)->default('')->change();
        });
    }
}
