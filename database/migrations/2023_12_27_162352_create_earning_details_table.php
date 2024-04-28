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
        Schema::create('earning_details', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('earnings_id')->nullable(false);
            $table->Integer('menu_id')->nullable(false);
            $table->text('name')->nullable(false);
            $table->smallInteger('price')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('earning_details');
    }
};
