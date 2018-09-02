<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWechatsTable extends Migration {
    public function up() {
        Schema::create('wechats', function (Blueprint $table) {
            $table->increments('id');

            $table->string('slug', 20)->comment('微信号');
            $table->string('title', 20)->comment('名称');
            $table->string('description', 20)->comment('描述');
            $table->enum('type', ['company','personal','test'])->comment('类型');
            $table->boolean('auth')->comment('认证');
            $table->boolean('is_default')->comment('默认');
            $table->boolean('email')->comment('邮箱');
            $table->string('gh_id', 20)->comment('工号');
            $table->string('open_id', 20)->comment('');
            $table->string('avatar')->comment('头像');
            $table->string('qrcode')->comment('二维码');
            $table->string('city', 20)->comment('城市');
            $table->string('address', 20)->comment('地址');
            $table->string('appid', 20)->comment('AppID');
            $table->string('appsecret', 50)->comment('AppSecret');
            $table->string('token', 20)->comment('Token');
            $table->string('encodingaeskey')->comment('EncodingAESKey');

            $table->unsignedTinyInteger('corporation_id')->comment('公司 ID');
            $table->unsignedInteger('created_by');
            $table->unsignedTinyInteger('sort')->default(255);
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '微信';
        });
    }
    public function down() {
        Schema::dropIfExists('wechats');
    }
}
