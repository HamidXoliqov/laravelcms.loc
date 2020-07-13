<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_setting', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(1);
            $table->string('title');
            $table->string('short');
            $table->string('description');
            $table->string('address');
            $table->string('keywords');
            $table->string('owner');
            $table->string('logotype');
            $table->string('phone');
            $table->string('email');
            $table->string('url');
            $table->string('faks');
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
        Schema::dropIfExists('site_setting');
    }
}
