<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); // 제목
            $table->dateTime('date'); // 날짜
            $table->string('category'); // 구분
            $table->string('content'); // 내용
            $table->string('image'); // 정부 이미지
            $table->string('customer_email'); // 대상자
            $table->string('address'); // 주소
            $table->integer('price'); // 금액
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
        Schema::dropIfExists('notices');
    }
}
