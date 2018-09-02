<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalProjectsTable extends Migration {
    public function up() {
        Schema::create('hospital_projects', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '医院 - 项目';
        });
    }
    public function down() {
        Schema::dropIfExists('hospital_projects');
    }
}
