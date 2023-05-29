<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavedCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_company', function (Blueprint $table) {
            $table->id('saved_company_id');
            $table->unsignedBigInteger('normal_user_id');
            $table->unsignedBigInteger('company_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            //* If the user is deleted, delete the saved company
            $table->foreign('normal_user_id')->references('normal_user_id')->on('normal_user')->onDelete('cascade');

            //* If the company is deleted, delete the saved company from the user
            $table->foreign('company_id')->references('company_id')->on('company')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saved_company');
    }
}
