<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabletusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()  
    {
        Schema::create('tabletusers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rechner_id')->unique;
            $table->string('login_pw')->unique;
            $table->string('admin_pw');
            $table->string('email_user')->unique;
            $table->string('email_pw');
            $table->string('interviewer_id')->nullable();
            $table->timestamps();
            $table->foreign('interviewer_id')
                    ->references('id')->on('interviewers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabletusers');
    }
}
