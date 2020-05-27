<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('dob')->default(null);
            $table->string('email')->unique();
            $table->string('adhaar_no')->unique();
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('contact_no')->nullable()->default(null);
            $table->unsignedInteger('party_id');
            $table->string('address')->nullable()->default(null);
            $table->unsignedInteger('district_id')->default(2);
            $table->unsignedInteger('state_id')->default(1);
            $table->string('image')->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('candidates');
    }
}
