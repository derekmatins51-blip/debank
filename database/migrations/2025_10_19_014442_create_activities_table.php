<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user')->nullable(); // For user ID, links to users/admins
            $table->string('ip_address')->nullable(); // User's IP
            $table->timestamps();
            $table->string('device')->nullable(); // e.g., 'WebKit'
            $table->string('browser')->nullable(); // e.g., 'Chrome'
            $table->string('os')->nullable(); // e.g., 'Windows'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
