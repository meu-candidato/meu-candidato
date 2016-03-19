<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function ($table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('facebook_id', 255);
            $table->text('access_token');
            $table->boolean('admin')->default(false)->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
