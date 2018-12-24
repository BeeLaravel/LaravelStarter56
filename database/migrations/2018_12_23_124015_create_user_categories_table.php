<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateUserCategoriesTable extends Migration {
    public function up() {
        Schema::create('user_categories', function (Blueprint $table) {
            $table->increments('id');

            $table->enum('type', [
                'common',
                'links',
                'posts',
            ]);
            $table->string('slug', 20);
            $table->string('title', 20);
            $table->string('description', 255)->nullable();
            $table->integer('parent_id')->default(0);

            $table->integer('sort')->default(255);
            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '用户 - 分类';
        });
    }
    public function down() {
        Schema::dropIfExists('user_categories');
    }
}
