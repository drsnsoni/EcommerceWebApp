<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->foreignId('category_id')->constrained('maincategory')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->integer('price');
            $table->text('description');
            $table->text('description2');
            $table->text('image');
            $table->integer('quantity');
            $table->foreignId('height_id')->constrained('height')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('type_id')->constrained('type')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('size_id')->constrained('size')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('color')->nullable();
            $table->integer('stock');
            $table->boolean('is_available')->default(0);
            $table->json('other_details')->nullable();
            $table->timestamps();
        });
    }

    /**+
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
