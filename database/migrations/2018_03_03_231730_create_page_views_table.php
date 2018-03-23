<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_views', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sid')->nullable();
            $table->unsignedInteger('bid')->nullable();
            $table->string('from_ip', 70);
            $table->string('from_os', 100);
            $table->string('from_wb'); //WebBrowser
            $table->timestamps();

            $table->foreign('sid')->references('id')->on('services')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bid')->references('id')->on('blogs')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_views');
    }
}
