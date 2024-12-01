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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('Test_id', 12)->unique()->nullable();;
            $table->string('product_id', 10);  
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->string('T_type'); 
            $table->string('result'); 
            $table->string('remarks'); 
            $table->string('criteria'); 
            $table->date('start_date'); 
            $table->date('end_date'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
