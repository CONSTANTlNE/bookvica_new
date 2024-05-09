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
        Schema::create('changes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_invoice_id')->nullable()->constrained('purchase_invoices')->cascadeOnDelete();
            $table->foreignId('sales_invoice_id')->nullable()->constrained('sales_invoices')->cascadeOnDelete();
            $table->boolean('checked')->default(0);
            $table->boolean('reviewed_period')->default(0);
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('changes');
    }
};
