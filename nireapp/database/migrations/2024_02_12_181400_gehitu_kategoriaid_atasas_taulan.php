<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('atasas', function (Blueprint $table) {
             $table->bigInteger('kategoria_id')->unsigned();
                $table
                    ->foreign('kategoria_id')
                    ->references('id')
                    ->on('kategorias')->after('izena');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('atasas', function (Blueprint $table) {
            //
        });
    }
};
