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
        Schema::create('magazines', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_en')->nullable();
            $table->string('title_fr')->nullable();
            $table->string('thumbnail');
            $table->string('thumbnail_fr')->nullable();
            $table->string('thumbnail_en')->nullable();
            $table->string('book');
            $table->string('book_fr')->nullable();
            $table->string('book_en')->nullable();
            $table->boolean('is_published');
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
        Schema::dropIfExists('magazines');
    }
};
