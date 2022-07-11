<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('customer_id')->nullable();
            $table->foreignId('reseller_id')->nullable();
            $table->foreignId('manager_id')->nullable();
            $table->foreignId('service_zone_id')->nullable();
            $table->unsignedInteger('status')->default(1);
            $table->string('company')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->string('emergency')->nullable();
            $table->string('national_id')->nullable();
            $table->date('birth')->nullable();
            $table->string('mikrotik_user')->nullable();
            $table->string('mikrotik_connection_type')->nullable();
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
