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
            $table->string('product_date')->nullable();
            $table->bigInteger('qty')->nullable();
            $table->float('buy_price')->nullable();
            $table->float('vat')->nullable();
            $table->float('final_price')->nullable();
            $table->float('per_product_price')->nullable();
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
