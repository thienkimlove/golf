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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->string('phone')->unique()->default('+84903347191');
            $table->string('avatar')->nullable();
            $table->unsignedSmallInteger('user_type')->default(0);

            $table->boolean('is_admin')->default(false);

            $table->boolean('is_active')->default(true);

            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('organization_id')->nullable();

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
