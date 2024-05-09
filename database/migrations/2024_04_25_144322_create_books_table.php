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
        // შესყიდვის / გაყიდვის კურსი და ვალუტა ინვოისებში შეიძლება
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('stock');
            $table->string('book_code')->nullable();
            $table->text('title')->index();
            $table->string('author')->nullable();
            $table->integer('qty')->default(1);
            $table->foreignId('purchase_invoice_id')->constrained('purchase_invoices')->cascadeOnDelete();
            $table->string('purchase_currency');
            $table->float('purchase_amount');
            $table->float('purchase_rate')->nullable();
            $table->float('purchase_gel')->index();
            $table->foreignId('sales_invoice_id')->nullable()->constrained('sales_invoices');
            $table->string('sales_currency')->nullable();
            $table->float('sales_amount')->nullable();
            $table->float('sales_rate')->nullable();
            $table->float('sales_gel')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('sales_location')->nullable();
            $table->text('comment')->nullable();

            $table->boolean('reviewed')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
