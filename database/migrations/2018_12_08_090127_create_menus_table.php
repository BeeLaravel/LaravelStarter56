<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration {
    public function up() {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title', 20)->comment('标题');
            $table->text('description')->comment('描述');

            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '菜单';
        });
    }
    public function down() {
        Schema::dropIfExists('menus');
    }
}
