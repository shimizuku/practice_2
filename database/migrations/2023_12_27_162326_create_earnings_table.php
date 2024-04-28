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
        Schema::create('earnings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable(false);
            $table->time('visit_at')->nullable(false);
            $table->text('customer_name')->nullable(false);
            $table->tinyInteger('customer_gender')->nullable(false);
            $table->tinyInteger('customer_age')->nullable(false);
            $table->Integer('create_user')->nullable(false);
            $table->Integer('update_user');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('earnings');
    }
};
