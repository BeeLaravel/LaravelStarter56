<?php

use Jialeo\LaravelSchemaExtend\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('category_id')->default(0)->comment('分类ID');
            $table->enum('type', ['Site','SubSite','Special','Category','Tag','Post','Discuss','Other'])->comment('类型');
            $table->string('slug', 50)->comment('标识');
            $table->string('url')->comment('链接');
            $table->string('title', 50)->comment('标题');
            $table->text('description')->nullable()->comment('描述');

            $table->integer('user_id')->default(0);
            $table->unsignedTinyInteger('sort')->default(255);
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '链接 - 链接';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
