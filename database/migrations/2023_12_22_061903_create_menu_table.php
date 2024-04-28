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
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedMediumInteger('menu_category_id');
            $table->text('name')->nullable();
            $table->smallInteger('price')->nullable();
            $table->smallInteger('turn')->nullable();
            $table->unsignedMediumInteger('create_user');
            $table->unsignedMediumInteger('update_user')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
