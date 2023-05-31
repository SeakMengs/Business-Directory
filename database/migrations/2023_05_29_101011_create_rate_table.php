<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate', function (Blueprint $table) {
            $table->id('rate_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('normal_user_id');
            $table->tinyInteger('star_number');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            //* If the company is deleted, delete the rate
            // $table->foreign('company_id')->references('company_id')->on('company')->onDelete('cascade');

            //* If the user is deleted, delete the rate
            // $table->foreign('normal_user_id')->references('normal_user_id')->on('normal_user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rate');
    }
}
