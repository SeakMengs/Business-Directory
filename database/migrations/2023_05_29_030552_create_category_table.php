<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id('category_id');
            // default super admin id start from 1 meaning that if the category is added by database it's added by super admin
            $table->unsignedBigInteger('add_by_admin_id')->default(1);
            $table->text('name');
            $table->text('logo_url')->nullable();
            $table->unsignedBigInteger('edit_by_admin_id')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            // $table->foreign('add_by_admin_id')->references('admin_id')->on('admin_user');
            // $table->foreign('edit_by_admin_id')->references('admin_id')->on('admin_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
}
