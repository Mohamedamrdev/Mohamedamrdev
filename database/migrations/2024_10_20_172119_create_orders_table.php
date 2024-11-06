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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('payment_method'); // إضافة حقل طريقة الدفع
            $table->string('card_number')->nullable(); // إضافة حقل رقم البطاقة
            $table->string('cvv')->nullable(); // إضافة حقل CVV
            $table->string('expire_date')->nullable();
            $table->text('order_details')->nullable();
            $table->decimal('total', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
