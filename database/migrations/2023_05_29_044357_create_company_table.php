<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->id('company_id');
            $table->unsignedBigInteger('company_user_id');
            $table->unsignedBigInteger('category_id');
            $table->text('name');
            $table->text('street');
            $table->text('city');
            $table->text('district');
            $table->text('commune');
            $table->text('village');
            $table->text('logo')->nullable();
            $table->text('email');
            $table->text('website')->nullable();
            $table->text('description');
            $table->boolean('is_banned')->default(false);
            $table->unsignedBigInteger('ban_by_admin_id')->nullable();
            $table->unsignedBigInteger('unban_by_admin_id')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            //* if company_user_id is deleted, delete the companies that belong to that company_user_id as well
            // $table->foreign('company_user_id')->references('company_user_id')->on('company_user')->onDelete('cascade');

            // $table->foreign('category_id')->references('category_id')->on('category');
            // $table->foreign('ban_by_admin_id')->references('admin_id')->on('admin_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company');
    }
}
