<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->decimal('blance');
        });
        //充值记录
        Schema::create('blancelog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->decimal('quantity');
            $table->enum('paytype',[1,2])->default(1)->comment('支付方式,1支付宝,2微信,3存储');
            $table->string('tradeno')->comment('在线支付交易流水');
            $table->char('time',10)->default('时间');
        });
        //储蓄卡记录
        Schema::create('blancecard', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->decimal('quantity');
            $table->string('transfer_name');
            $table->string('transfer_no');
            $table->char('status',1);
            $table->char('time',10)->default('时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blance');
        Schema::dropIfExists('blancelog');
        Schema::dropIfExists('blancecard');
    }
}
