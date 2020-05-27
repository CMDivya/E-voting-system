<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('dob')->default(null);
            $table->string('image')->nullable()->default(null);
            $table->string('type')->default('voter');
            $table->string('email')->unique();
            $table->string('adhaar_no')->unique();
            $table->string('contact_no')->nullable()->default(null);
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('address')->nullable()->default(null);
            $table->unsignedInteger('district_id')->default(2);
            $table->unsignedInteger('state_id')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
}
