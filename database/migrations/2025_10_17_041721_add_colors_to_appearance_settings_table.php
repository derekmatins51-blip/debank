<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColorsToAppearanceSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appearance_settings', function (Blueprint $table) {
            $table->string('primary_color')->nullable(); // Main color, nullable means can be empty
            $table->string('primary_color_50')->nullable();
            $table->string('primary_color_100')->nullable();
            $table->string('primary_color_200')->nullable();
            $table->string('primary_color_300')->nullable();
            $table->string('primary_color_400')->nullable();
            $table->string('primary_color_600')->nullable();
            $table->string('primary_color_700')->nullable();
            $table->string('primary_color_foreground')->nullable();
            $table->string('secondary_color')->nullable();
            $table->string('secondary_color_50')->nullable();
            $table->string('secondary_color_100')->nullable();
            $table->string('secondary_color_200')->nullable();
            $table->string('secondary_color_300')->nullable();
            $table->string('secondary_color_400')->nullable();
            $table->string('secondary_color_600')->nullable();
            $table->string('secondary_color_700')->nullable();
            $table->string('secondary_color_foreground')->nullable();
            $table->string('accent_color')->nullable();
            $table->string('accent_color_50')->nullable();
            $table->string('accent_color_100')->nullable();
            $table->string('accent_color_200')->nullable();
            $table->string('accent_color_300')->nullable();
            $table->string('accent_color_400')->nullable();
            $table->string('accent_color_600')->nullable();
            $table->string('accent_color_700')->nullable();
            $table->string('accent_color_foreground')->nullable();
            $table->string('background_color')->nullable();
            $table->string('foreground_color')->nullable();
            $table->string('card_color')->nullable();
            $table->string('card_foreground_color')->nullable();
            $table->string('muted_color')->nullable();
            $table->string('muted_foreground_color')->nullable();
            $table->string('border_color')->nullable();
            $table->string('input_color')->nullable();
            $table->string('ring_color')->nullable();
            $table->string('gradient_pink_from')->nullable();
            $table->string('gradient_purple_via')->nullable();
            $table->string('gradient_indigo_to')->nullable();
            $table->string('yellow_action')->nullable();
            $table->string('green_positive')->nullable();
            $table->string('red_negative')->nullable();
            $table->string('preloader_background')->nullable();
            $table->string('preloader_background_dark')->nullable();
            $table->string('preloader_text_color')->nullable();
            $table->string('preloader_accent_color')->nullable();
            $table->boolean('use_gradient')->default(1); // 1 for true, boolean is yes/no
            $table->string('gradient_direction')->nullable();
            $table->text('custom_css')->nullable(); // Longer text field
            $table->boolean('disable_animations')->default(0);
            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appearance_settings', function (Blueprint $table) {
            $table->dropColumn(['primary_color', 'primary_color_50', `primary_color_100`, `primary_color_200`, `primary_color_300`, `primary_color_400`, `primary_color_600`, `primary_color_700`, `primary_color_foreground`, `secondary_color`, `secondary_color_50`, `secondary_color_100`, `secondary_color_200`, `secondary_color_300`, `secondary_color_400`, `secondary_color_600`, `secondary_color_700`, `secondary_color_foreground`, `accent_color`, `accent_color_50`, `accent_color_100`, `accent_color_200`, `accent_color_300`, `accent_color_400`, `accent_color_600`, `accent_color_700`, `accent_color_foreground`, `background_color`, `foreground_color`, `card_color`, `card_foreground_color`, `muted_color`, `muted_foreground_color`, `border_color`, `input_color`, `ring_color`, `gradient_pink_from`, `gradient_purple_via`, `gradient_indigo_to`, `yellow_action`, `green_positive`, `red_negative`, `preloader_background`, `preloader_background_dark`, `preloader_text_color`, `preloader_accent_color`, `use_gradient`, `gradient_direction`, `custom_css`, `disable_animations`, `notes`, `updated_at`, `created_at`]);
        });
    }
}
