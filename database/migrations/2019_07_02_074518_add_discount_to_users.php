<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDiscountToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('discount')->default(1);
        });
        //订单中增加金额
        Schema::table('order', function (Blueprint $table) {
            $table->decimal('price')->comment('实际支付')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('discount');
        });
        Schema::table('order', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }
}
