<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCryptoAccountsColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crypto_accounts', function (Blueprint $table) {
            $table->string('btc')->nullable()->change();
            $table->string('eth')->nullable()->change();
            $table->string('ltc')->nullable()->change();
            $table->string('xrp')->nullable()->change();
            $table->string('link')->nullable()->change();
            $table->string('bat')->nullable()->change();
            $table->string('aave')->nullable()->change();
            $table->string('usdt')->nullable()->change();
            $table->string('xlm')->nullable()->change();
            $table->string('bch')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crypto_accounts', function (Blueprint $table) {
            $table->string('btc')->nullable(false)->change();
            $table->string('eth')->nullable(false)->change();
            $table->string('ltc')->nullable(false)->change();
            $table->string('xrp')->nullable(false)->change();
            $table->string('link')->nullable(false)->change();
            $table->string('bat')->nullable(false)->change();
            $table->string('aave')->nullable(false)->change();
            $table->string('usdt')->nullable(false)->change();
            $table->string('xlm')->nullable(false)->change();
            $table->string('bch')->nullable(false)->change();
        });
    }
}
