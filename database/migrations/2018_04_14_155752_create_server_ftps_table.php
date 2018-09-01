<?php

use Jialeo\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServerFtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_ftps', function (Blueprint $table) {
            $table->increments('id');

            $table->string('account', 50)->comment('账号');
            $table->string('password')->comment('密码');
            $table->string('title', 50)->comment('标题');
            $table->text('description')->comment('描述');

            $table->unsignedTinyInteger('sort')->default(255);
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '服务器 - FTP';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('server_ftps');
    }
}
