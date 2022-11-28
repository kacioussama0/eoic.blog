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
        Schema::create('join_us', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('email');
            $table->string('phone');
            $table->string('nationality_and_residence');
            $table->string('national_card_id');
            $table->string('national_card_place');
            $table->string('address');
            $table->string('level');
            $table->string('level_speciality')->nullable();
            $table->string('job')->nullable();
            $table->boolean('joined_associations');
            $table->string('joined_associations_name')->nullable();
            $table->boolean('joined_political_parts');
            $table->string('joined_political_parts_name')->nullable();
            $table->string('inclinations');
            $table->string('abilities');
            $table->string('additions_human_rights');
            $table->string('additions_media');
            $table->string('why_join');

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
        Schema::dropIfExists('join_us');
    }
};
