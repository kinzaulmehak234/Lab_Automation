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
            $table->string('product_id', 10)->unique();
            $table->string('Product_name')->required()->unique();
            $table->date('manufacture_date');
            $table->string('Product_desc');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('pcategories');
            $table->unsignedBigInteger('PType_id');
            $table->foreign('PType_id')->references('id')->on('product_types');
            $table->enum('status', ['pending', 'testing', 'approved'])->default('pending');
            $table->timestamps();
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    
    {  Schema::table('products', function (Blueprint $table) {
        $table->dropColumn('status');
    });
        Schema::dropIfExists('products');
    }
};
