<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_title');

            $table->string('phone1', 45)->nullable();
            $table->string('phone2', 45)->nullable();
            $table->string('email1')->nullable();
            $table->string('email2')->nullable();

            $table->text('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();

            $table->string('address', 40)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('estate', 45)->nullable();
            $table->string('zip', 15)->nullable();

            $table->float('geolat', 10,6)->nullable();
            $table->float('geolng', 10,6)->nullable();

            $table->text('ganalytics')->nullable();

            $table->string('social_facebook')->nullable();
            $table->string('social_twitter')->nullable();
            $table->string('social_pinterest')->nullable();
            $table->string('social_linkedin')->nullable();
            $table->string('social_googleplus')->nullable();
            $table->string('social_youtube')->nullable();
            $table->string('social_skype')->nullable();
            $table->string('social_instagram')->nullable();

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
}
