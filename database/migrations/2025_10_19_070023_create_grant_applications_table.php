<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrantApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grant_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('application_type')->nullable();
            $table->string('status')->default('pending')->nullable();
            $table->string('program_funding')->nullable();
            $table->string('equipment_funding')->nullable();
            $table->string('research_funding')->nullable();
            $table->string('community_outreach')->nullable();
            $table->string('legal_name')->nullable();
            $table->string('mailing_address')->nullable();
            $table->string('ein')->nullable();
            $table->string('incorporation_date')->nullable();
            $table->string('mission_statement')->nullable();
            $table->string('service_areas')->nullable();
            $table->string('organization_history')->nullable();
            $table->string('requested_amount')->nullable();
            $table->string('approved_amount')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->string('disbursal_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grant_applications');
    }
}
