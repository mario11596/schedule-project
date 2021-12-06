<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->timestamps();
        });

        Schema::create('professor_subject_p_p_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subjectPP_id');
            $table->unsignedBigInteger('professor_id');
            $table->timestamps();

            $table->unique(['subjectPP_id', 'professor_id']);

            $table->foreign('subjectPP_id')->references('id')->on('subject_p_p_s')->onDelete('cascade');
            $table->foreign('professor_id')->references('id')->on('professors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professor_subject_p_p_s');
        Schema::dropIfExists('professors');
        
    }
}
