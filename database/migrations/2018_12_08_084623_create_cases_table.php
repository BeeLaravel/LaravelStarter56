<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasesTable extends Migration {
    public function up() {
        Schema::create('cases', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title', 50)->nullable();
            $table->string('original_name', 255)->nullable();
            $table->string('filename', 255)->nullable();

            $table->integer('category_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('project_id')->nullable();
            $table->integer('doctor_id')->nullable();
            $table->integer('star')->nullable();

            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '案例';
        });
    }
    public function down() {
        Schema::dropIfExists('cases');
    }
}
