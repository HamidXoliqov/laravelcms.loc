<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_id');
            $table->string('title');
            $table->string('short');
            $table->text('text');
            $table->string('image');
            $table->string('slug');
            $table->string('time');
            $table->integer('views')->default(0);
            $table->integer('price')->nullable();
            $table->integer('sale')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('telegram')->default(0);
            $table->integer('facebook')->default(0);
            $table->integer('user_id')->nullable();
            $table->integer('status')->default(1);

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
        Schema::dropIfExists('pages');
    }
}
