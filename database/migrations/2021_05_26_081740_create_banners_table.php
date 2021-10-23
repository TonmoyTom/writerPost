<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('main_title');
            $table->string('title_2nd');
            $table->string('title_3rd');
            $table->string('title_4th')->nullable();
            $table->string('title_5th')->nullable();
            $table->string('imagename');
            $table->string('slug')->unique();
            $table->string('social1');
            $table->string('social2');
            $table->string('social3');
            $table->string('social4')->nullable();
            $table->string('link1')->nullable();
            $table->string('link2')->nullable();
            $table->string('link3')->nullable();
            $table->string('link4')->nullable();
            $table->string('files')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('banners');
    }
}
