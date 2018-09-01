<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticeGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('n_id');
            $table->string('category');
            $table->string('email');
            $table->text('tx_hash');
            $table->text('block_hash');
            $table->integer('result')->default(0); // 상태 미납 여부
            $table->timestamps();

            $table->foreign('email')
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
        Schema::dropIfExists('notice_groups');
    }
}
