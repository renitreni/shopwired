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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); // Automatically adds 'created_at' and 'updated_at' columns
            
            $table->string('product_api_id')->comment('api column');
            $table->string('title');
            $table->integer('stock_alert')->default(0);
            $table->text('description')->nullable();
            $table->text('description2')->nullable();
            $table->text('description3')->nullable();
            $table->text('description4')->nullable();
            $table->text('description5')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('bundle')->default(false);
            $table->integer('sortOrder')->nullable();
            $table->decimal('deliveryPrice', 8, 2)->nullable();
            $table->boolean('freeDelivery')->default(false);
            $table->decimal('singleDeliveryPrice', 8, 2)->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->string('metaTitle')->nullable();
            $table->string('metaKeywords')->nullable();
            $table->text('metaDescription')->nullable();
            $table->string('slug')->unique();
            $table->string('url')->nullable();
            $table->string('videoCode')->nullable();
            $table->string('sku')->nullable();
            $table->integer('stock')->default(0);
            $table->decimal('comparePrice', 8, 2)->nullable();
            $table->string('gtin')->nullable(); // Global Trade Item Number
            $table->string('mpn')->nullable(); // Manufacturer Part Number
            $table->boolean('new')->default(false);
            $table->boolean('twoForOne')->default(false);
            $table->boolean('threeForTwo')->default(false);
            $table->boolean('vatExclusive')->default(false);
            $table->text('warehouseNotes')->nullable();
            $table->decimal('price', 8, 2);
            $table->decimal('costPrice', 8, 2)->nullable();
            $table->decimal('salePrice', 8, 2)->nullable();
            $table->boolean('excludedFromTradeDiscounts')->default(false);
            $table->string('searchKeywords')->nullable();
            $table->boolean('hasRandomRelatedProducts')->default(false);
            $table->boolean('shippingAddressNotRequired')->default(false);
            $table->boolean('googleIsBundle')->default(false);
            $table->boolean('googleNoIdentifierExists')->default(false);
            $table->boolean('eBayBestOffer')->default(false);
            $table->string('eBayCondition')->nullable();
            $table->boolean('fileUploadsAllowed')->default(false);
            $table->integer('rewardPoints')->nullable();
            $table->string('salesTaxCode')->nullable();
            $table->boolean('salesTaxExempt')->default(false);
            $table->boolean('subscription')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
