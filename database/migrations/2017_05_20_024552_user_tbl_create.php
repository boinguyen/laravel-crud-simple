<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTblCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            //$table->string('email');
            $table->string('password');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('activation_code', 255)->nullable();
            $table->enum('role', array('admin', 'user'));
            $table->enum('status', array('waiting', 'active', 'block'));
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
