<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CeateArchitectureCorporationsTable extends Migration {
    public function up() {
        Schema::create('architecture_corporations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug'， 50);
            $table->string('title', 20);
            $table->text('description');

            $table->string('address', 100);
            $table->string('tel', 15);
            $table->string('postcode', 10);

            $table->unsignedInteger('parent_id')->default(0);

            $table->unsignedTinyInteger('sort')->default(255);
            $table->unsignedInteger('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '架构 - 公司';
        });
    }
    public function down() {
        Schema::dropIfExists('architecture_corporations');
    }
}
