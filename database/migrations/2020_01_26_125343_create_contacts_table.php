<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('mobile');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('city');
            $table->string('leadSource');
            $table->string('status');
            $table->string('profileImage', 75)->nullable();
            $table->string('sports');
            $table->text('notes');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            // $table->unsignedBigInteger('group_id', 11)->nullable();
            // $table->foreign('group_id', 11)->references('id')->on('groups')->onDelete('cascade');
            $table->double('fees');
            $table->string('subscriptionDate');
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
        Schema::dropIfExists('contacts');
    }
}
