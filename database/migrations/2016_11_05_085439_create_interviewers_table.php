<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviewers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('intnr',8)->unique();
            $table->char('vorname',20);
            $table->char('nachname',20);
            $table->string('privat_email',20)->nullable();
            $table->string('privat_tel1',20)->nullable();
            $table->string('privat_tel2',20)->nullable();
            $table->index('vorname', 'nachname');
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
        Schema::dropIfExists('interviewers');
    }
}
