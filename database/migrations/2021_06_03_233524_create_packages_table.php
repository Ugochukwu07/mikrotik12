<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("packages", function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("bandwidth");
            $table->boolean("status")->default(1); // active
            $table->unsignedTinyInteger("type")->default(2);
            $table->unsignedInteger("user_price")->nullable()->default(null);
            $table->unsignedInteger("reseller_price")->nullable()->default(null);
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
        Schema::dropIfExists("packages");
    }
}
