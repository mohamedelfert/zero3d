<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->float('price')->default(0.0);
            $table->float('compare_price')->nullable();
            $table->float('rate')->default(0);
            $table->json('options')->nullable();
            $table->boolean('featured')->default(0);
            $table->enum('status',['active','draft','archived'])->default('active');
            $table->foreignId('category_id')->nullable()->constrained('categories', 'id')->nullOnDelete();
            $table->foreignId('store_id')->constrained('stores', 'id')->cascadeOnDelete();
//            $table->integer('category_id')->unsigned();
//            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
