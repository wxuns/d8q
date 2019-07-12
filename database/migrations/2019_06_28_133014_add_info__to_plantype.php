<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInfoToPlantype extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plantype', function (Blueprint $table) {
            $table->string('info')->comment('简介');
        });
        Schema::table('plan', function (Blueprint $table) {
            $table->string('remark')->nullable()->comment('备注');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plantype', function (Blueprint $table) {
            $table->dropColumn('info');
        });
        Schema::table('plan', function (Blueprint $table) {
            $table->dropColumn('remark');
        });
    }
}
