<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('menu_id')->unique()->nullable()->after('id'); // Voeg de menu_id kolom toe en maak deze uniek
            $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade'); // Stel de foreign key in
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['menu_id']); // Verwijder de foreign key
            $table->dropColumn('menu_id'); // Verwijder de menu_id kolom
        });
    }
};
