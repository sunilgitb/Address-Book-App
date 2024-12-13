<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressColumnsToBooksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('contact_name')->nullable();
            $table->string('contact_number', 15)->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('address_line_3')->nullable();
            $table->string('pincode', 10)->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->boolean('is_default_from')->default(false); // Default from address
            $table->boolean('is_default_to')->default(false);   // Default to address
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn([
                'contact_name',
                'contact_number',
                'address_line_1',
                'address_line_2',
                'address_line_3',
                'pincode',
                'city',
                'state',
                'country',
                'is_default_from',
                'is_default_to',
            ]);
        });
    }
}
