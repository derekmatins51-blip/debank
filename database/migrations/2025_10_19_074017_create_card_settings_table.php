<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_settings', function (Blueprint $table) {
            $table->id();
            $table->string('standard_fee')->nullable();
            $table->string('gold_fee')->nullable();
            $table->string('platinum_fee')->nullable();
            $table->string('black_fee')->nullable();
            $table->string('monthly_fee')->nullable();
            $table->string('topup_fee_percentage')->nullable();
            $table->string('atm_withdrawal_fee')->nullable();
            $table->boolean('is_enabled')->default(1)->nullable();
            $table->string('max_daily_limit')->nullable();
            $table->string('min_daily_limit')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('card_settings');
    }
}
