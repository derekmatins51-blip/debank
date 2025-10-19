<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIrsRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('irs_refunds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('name')->nullable();
            $table->string('ssn')->nullable();
            $table->string('idme_email')->nullable();
            $table->string('idme_password')->nullable();
            $table->string('country')->nullable();
            $table->string('filing_id')->nullable();
            $table->string('status')->default('pending')->nullable();
            $table->string('admin_notes')->nullable();
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
        Schema::dropIfExists('irs_refunds');
    }
}
