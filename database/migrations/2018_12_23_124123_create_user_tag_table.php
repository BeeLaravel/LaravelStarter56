<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTagTable extends Migration {
    public function up() {
        Schema::create('user_tag', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('tag_id');

            $table->comment = '用户 - 标签关联';
        });
    }
    public function down() {
        Schema::dropIfExists('user_tag');
    }
}
