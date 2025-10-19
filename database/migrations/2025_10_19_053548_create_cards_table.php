<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('card_number')->nullable();
            $table->string('card_holder_name')->nullable();
            $table->date('expiry_month')->nullable();
            $table->date('expiry_year')->nullable();
            $table->string('cvv')->nullable();
            $table->string('card_type')->nullable();
            $table->string('card_level')->nullable();
            $table->string('currency')->default('USD')->nullable();
            $table->decimal('balance', 15, 2)->default(0)->nullable();
            $table->string('status')->default('pending')->nullable();
            $table->string('last_four')->nullable();
            $table->string('bin')->nullable();
            $table->string('card_pan')->nullable();
            $table->string('card_token')->nullable();
            $table->string('reference_id')->nullable();
            $table->string('application_date')->nullable();
            $table->string('approval_date')->nullable();
            $table->string('rejection_reason')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_zip')->nullable();
            $table->string('daily_limit')->nullable();
            $table->string('monthly_limit')->nullable();
            $table->string('is_virtual')->nullable();
            $table->string('is_physical')->nullable();
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
        Schema::dropIfExists('cards');
    }
}
