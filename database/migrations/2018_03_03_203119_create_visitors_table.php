<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip', 70)->nullable();
            $table->string('country', 45)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('estate', 100)->nullable();
            $table->string('os_system', 100)->nullable();
            $table->string('browser')->nullable();
            $table->string('referrer')->nullable();
            $table->string('full_link')->nullable();
            $table->string('load_time')->nullable();
            $table->boolean('has_returned')->default('0');
            $table->unsignedSmallInteger('access')->default('1');
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
        Schema::dropIfExists('visitors');
    }
}
