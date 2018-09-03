<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWechatUsersTable extends Migration {
    public function up() {
        Schema::create('wechat_users', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '微信 - 用户';
        });
    }
    public function down() {
        Schema::dropIfExists('wechat_users');
    }
}
