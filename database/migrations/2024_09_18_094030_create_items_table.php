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
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->date('item_date')->nullable();
            $table->string('title')->nullable();
            $table->string('licence')->nullable();
            $table->string('dimension')->nullable();
            $table->string('format')->nullable();
            // $table->boolean('active')->default(0);
            $table->string('image')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('tag_id')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
