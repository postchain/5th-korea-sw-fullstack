<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electrics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_email'); // 대상자
            $table->string('title'); // 제목
            $table->dateTime('a_date'); // 전 달
            $table->dateTime('n_date'); // 마지막 달
            $table->string('address'); // 주소
            $table->integer('price'); // 청구금액
            $table->string('date'); // 사용 기간
            $table->integer('c_month'); // 당월 지침
            $table->integer('pre_month'); // 전월 지침
            $table->integer('usage'); // 사용량
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
        Schema::dropIfExists('electrics');
    }
}
