<?php

use Jialeo\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title', 50)->comment('标题');
            $table->string('slug', 50)->comment('标识');
            $table->string('keywords', 50)->nullable()->comment('关键词');
            $table->text('description')->nullable()->comment('描述');

            $table->integer('category_id')->default(0)->comment('分类 ID');

            $table->unsignedTinyInteger('sort')->default(255);
            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '文章 - 文章';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
