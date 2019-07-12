<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRenew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renew', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('planid')->comment('套餐id');
            $table->integer('userid')->comment('用户id');
            $table->integer('signid')->comment('应用id');
            $table->decimal('price')->comment('价格');
            $table->enum('paytype',[1,2,3,4])->default(1)->comment('支付方式,1支付宝,2微信,3余额,4存储');
            $table->string('tradeno')->comment('在线支付交易流水');
            $table->enum('isrefund',[0,1])->default(0)->comment('是否退款');
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
        Schema::dropIfExists('renew');
    }
}
