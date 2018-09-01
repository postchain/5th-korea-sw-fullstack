<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); // 제목
            $table->dateTime('a_date'); // 전 달
            $table->dateTime('n_date'); // 마지막 달
            $table->string('customer_email'); // 구분
            $table->string('address'); // 주소
            $table->string('place_violation'); // 위반 장소
            $table->date('date_violation'); // 위반 일시
            $table->string('content_violation'); // 위반 내용
            $table->integer('price');
            $table->timestamps();

            $table->foreign('customer_email')
                ->references('email')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
