<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalDoctorsTable extends Migration {
    public function up() {
        Schema::create('hospital_doctors', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '医院 - 员工';
        });
    }
    public function down() {
        Schema::dropIfExists('hospital_doctors');
    }
}
