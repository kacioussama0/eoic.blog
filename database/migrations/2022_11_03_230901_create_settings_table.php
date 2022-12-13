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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('blog_name');
            $table->string('blog_name_en');
            $table->string('blog_name_fr');
            $table->string('slogan')->nullable();
            $table->string('slogan_en')->nullable();
            $table->string('slogan_fr')->nullable();
            $table->text('vision')->nullable();
            $table->text('vision_en')->nullable();
            $table->text('vision_fr')->nullable();
            $table->text('values')->nullable();
            $table->text('values_en')->nullable();
            $table->text('values_fr')->nullable();
            $table->text('goals')->nullable();
            $table->text('goals_en')->nullable();
            $table->text('goals_fr')->nullable();
            $table->text('message')->nullable();
            $table->text('message_en')->nullable();
            $table->text('message_fr')->nullable();
            $table->text('blog_description')->nullable();
            $table->text('blog_description_en')->nullable();
            $table->text('blog_description_fr')->nullable();
            $table->string('logo')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('address');
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
        Schema::dropIfExists('settings');
    }
};
