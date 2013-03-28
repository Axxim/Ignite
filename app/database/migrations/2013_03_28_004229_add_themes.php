<?php

use Illuminate\Database\Migrations\Migration;

class AddThemes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('themes', function($table) {
                $table->increments('id');

                $table->string('name');
                $table->string('type'); // light, dark
                $table->string('ace');

                $table->timestamps();
            });

        // Insert languages

        Theme::create(array('name' => 'Chrome', 'type' => 'light', 'ace' => 'ace/theme/chrome'));
        Theme::create(array('name' => 'Clouds', 'type' => 'light', 'ace' => 'ace/theme/clouds'));
        Theme::create(array('name' => 'Crimson Editor', 'type' => 'light', 'ace' => 'ace/theme/crimson_editor'));
        Theme::create(array('name' => 'Dawn', 'type' => 'light', 'ace' => 'ace/theme/dawn'));
        Theme::create(array('name' => 'Dreamweaver', 'type' => 'light', 'ace' => 'ace/theme/dreamweaver'));
        Theme::create(array('name' => 'Eclipse', 'type' => 'light', 'ace' => 'ace/theme/eclipse'));
        Theme::create(array('name' => 'GitHub', 'type' => 'light', 'ace' => 'ace/theme/github'));
        Theme::create(array('name' => 'Solarized Light', 'type' => 'light', 'ace' => 'ace/theme/solarized_light'));
        Theme::create(array('name' => 'TextMate', 'type' => 'light', 'ace' => 'ace/theme/textmate'));
        Theme::create(array('name' => 'Tomorrow', 'type' => 'light', 'ace' => 'ace/theme/tomorrow'));
        Theme::create(array('name' => 'XCode', 'type' => 'light', 'ace' => 'ace/theme/xcode'));

        Theme::create(array('name' => 'Ambiance', 'type' => 'dark', 'ace' => 'ace/theme/ambiance'));
        Theme::create(array('name' => 'Chaos', 'type' => 'dark', 'ace' => 'ace/theme/chaos'));
        Theme::create(array('name' => 'Clouds Midnight', 'type' => 'dark', 'ace' => 'ace/theme/clouds_midnight'));
        Theme::create(array('name' => 'Cobalt', 'type' => 'dark', 'ace' => 'ace/theme/cobalt'));
        Theme::create(array('name' => 'idleFingers', 'type' => 'dark', 'ace' => 'ace/theme/idle_fingers'));
        Theme::create(array('name' => 'krTheme', 'type' => 'dark', 'ace' => 'ace/theme/kr_theme'));
        Theme::create(array('name' => 'Merbivore', 'type' => 'dark', 'ace' => 'ace/theme/merbivore'));
        Theme::create(array('name' => 'Merbivore Soft', 'type' => 'dark', 'ace' => 'ace/theme/merbivore_soft'));
        Theme::create(array('name' => 'Mono Industrial', 'type' => 'dark', 'ace' => 'ace/theme/mono_industrial'));
        Theme::create(array('name' => 'Monokai', 'type' => 'dark', 'ace' => 'ace/theme/monokai'));
        Theme::create(array('name' => 'Pastel on dark', 'type' => 'dark', 'ace' => 'ace/theme/pastel_on_dark'));
        Theme::create(array('name' => 'Solarized Dark', 'type' => 'dark', 'ace' => 'ace/theme/solarized_dark'));
        Theme::create(array('name' => 'Twilight', 'type' => 'dark', 'ace' => 'ace/theme/twilight'));
        Theme::create(array('name' => 'Tomorrow Night', 'type' => 'dark', 'ace' => 'ace/theme/tomorrow_night'));
        Theme::create(array('name' => 'Tomorrow Night Blue', 'type' => 'dark', 'ace' => 'ace/theme/tomorrow_night_blue'));
        Theme::create(array('name' => 'Tomorrow Night Bright', 'type' => 'dark', 'ace' => 'ace/theme/tomorrow_night_bright'));
        Theme::create(array('name' => 'Tomorrow Night 80s', 'type' => 'dark', 'ace' => 'ace/theme/tomorrow_night_eighties'));
        Theme::create(array('name' => 'Vibrant Ink', 'type' => 'dark', 'ace' => 'ace/theme/vibrant_ink'));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('themes');
	}

}
