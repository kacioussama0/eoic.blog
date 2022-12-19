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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_en')->nullable();
            $table->string('title_fr')->nullable();
            $table->string('image');
            $table->string('image_en')->nullable();
            $table->string('image_fr')->nullable();
            $table->text('content');
            $table->text('content_en')->nullable();
            $table->text('content_fr')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')
                ->on('users')->cascadeOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('posts');
    }
};
