<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration {
    public function up() {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');

            $table->text('tags');
            $table->text('categories');

            $table->string('qq');
            $table->string('wechat');
            $table->string('weibo');
            $table->string('github');
            $table->string('gitee');

            $table->text('description');
            $table->text('old');

            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('user_profiles');
    }
}
