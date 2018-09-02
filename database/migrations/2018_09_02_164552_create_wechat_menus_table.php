<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWechatMenusTable extends Migration {
    public function up() {
        Schema::create('wechat_menus', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '微信 - 菜单';
        });
    }
    public function down() {
        Schema::dropIfExists('wechat_menus');
    }
}
