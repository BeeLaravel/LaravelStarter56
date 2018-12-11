<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemsTable extends Migration {
    public function up() {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title', 20)->comment('标题');
            $table->text('description')->comment('描述');
            $table->string('icon', 20)->comment('图标');

            $table->string('link', 20)->comment('链接');

            $table->tinyInteger('menu_id')->comment('菜单标识');
            $table->integer('parent_id')->nullable();

            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '菜单';
        });
    }
    public function down() {
        Schema::dropIfExists('menu_items');
    }
}
