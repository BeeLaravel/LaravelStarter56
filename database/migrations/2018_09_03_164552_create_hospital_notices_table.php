<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalNoticesTable extends Migration {
    public function up() {
        Schema::create('hospital_notices', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();

            $table->comment = '医院 - 注意事项';
        });
    }
    public function down() {
        Schema::dropIfExists('hospital_notices');
    }
}
