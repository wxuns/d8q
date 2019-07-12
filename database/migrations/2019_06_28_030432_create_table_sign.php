<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sign', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userid');
            $table->string('filename');
            $table->string('cospath');
            $table->string('qq',11)->nullable();
            $table->string('email')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('planid')->comment('套餐id')->nullable();
            $table->integer('subid')->comment('订单id')->nullable();
            $table->integer('certid')->comment('证书id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sign');
    }
}
