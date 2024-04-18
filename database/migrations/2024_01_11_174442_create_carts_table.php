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
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
           
            //$table->unsignedInteger('user_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('user_id')
            ->references('id')
            ->on('users');

            //$table->unsignedInteger('product_id');
            $table->unsignedInteger('product_id');

            $table->foreign('product_id')
            ->references('id')
            ->on('products');

            //$table->unsignedInteger('order_id')->nullable();
            $table->unsignedInteger('order_id')->nullable();

            $table->foreign('order_id')
            ->references('id')
            ->on('orders');

            $table->string('ip_address')->nullable();
            $table->integer('product_quantity')->default(1);
            
            $table->timestamps();


           /* $table->foreignId('product_id')
            ->constrained('products')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('order_id')
            ->constrained('orders')
            ->onUpdate('cascade')
            ->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
