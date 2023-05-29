<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->id('report_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('report_by_normal_user_id');
            $table->text('reason');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('company_id')->references('company_id')->on('company');
            $table->foreign('report_by_normal_user_id')->references('normal_user_id')->on('normal_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report');
    }
}
