<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id('usr_id'); // เปลี่ยนชื่อ primary key
            $table->string('usr_username', 45)->unique();
            $table->string('usr_email', 45)->unique();
            $table->string('usr_password', 45);
            $table->string('usr_name', 45);
            $table->string('usr_trello_name', 45)->nullable();
            $table->enum('usr_role', ['Developer', 'Tester'])->default('Developer');
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
        Schema::dropIfExists('users');
    }
};
