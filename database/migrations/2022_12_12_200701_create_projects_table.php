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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_en');
            $table->string('title_fr');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users')->cascadeOnUpdate();
            $table->text('description');
            $table->text('description_en');
            $table->text('description_fr');
            $table->double('amount');

            $table->double('suggestions_amount');
            $table->double('earned_amount');
            $table->enum('status',['PROGRESS','CLOSED','HIDDEN']);
            $table->string('thumbnail');
            $table->string('thumbnail_en');
            $table->string('thumbnail_fr');
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
        Schema::dropIfExists('projects');
    }
};
