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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('shop_id')->nullable();
            $table->string('product_id')->nullable();
            $table->bigInteger('unit_id')->nullable();
            $table->string('purchases_date')->nullable();
            $table->bigInteger('qty')->nullable();
            $table->decimal('buy_price',10,2)->nullable();
            $table->decimal('vat',10,2)->nullable();
            $table->decimal('final_price',10,2)->nullable();
            $table->decimal('per_product_price',10,2)->nullable();
            $table->bigInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
