<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->string('title')->nullable()->after('user_id');
            $table->string('type')->nullable()->after('message');
            $table->string('icon')->nullable()->after('type');
            $table->string('link')->nullable()->after('icon');
            $table->boolean('is_read')->default(0)->after('link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn(['title', 'type', 'icon', 'link', 'is_read']);
        });
    }
}
