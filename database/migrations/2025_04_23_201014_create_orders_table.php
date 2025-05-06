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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('shipping_address_id')->constrained()->onDelete('cascade');
            $table->decimal('subtotal', 10, 2)->default(0); // 🆕 Subtotal sin IVA
            $table->decimal('iva', 10, 2)->default(0);      // 🆕 IVA calculado
            $table->decimal('total', 10, 2);                // Total final con IVA y envío
            $table->string('status')->default('pendiente');
            $table->string('tracking')->default('preparation');
            $table->string('payment_method');
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
