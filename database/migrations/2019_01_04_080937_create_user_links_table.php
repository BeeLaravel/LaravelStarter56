<?php
use Jialeo\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLinksTable extends Migration {
    public function up() {
        Schema::create('user_links', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id')->default(0)->comment('分类ID');
            $table->enum('type', ['Site','SubSite','Special','Category','Tag','Post','Discuss','Other'])->comment('类型');
            $table->string('url')->comment('链接');
            $table->string('title', 50)->comment('标题');
            $table->text('description')->nullable()->comment('描述');

            $table->unsignedTinyInteger('sort')->default(255);
            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '用户 - 链接';
        });
    }
    public function down() {
        Schema::dropIfExists('user_links');
    }
}
