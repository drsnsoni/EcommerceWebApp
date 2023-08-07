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
        Schema::create('maincategory', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topcat_id')->constrained('topcategory')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->string('tag');
            $table->boolean('is_new')->nullable()->change();
            $table->boolean('bestseller')->nullable()->change();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
