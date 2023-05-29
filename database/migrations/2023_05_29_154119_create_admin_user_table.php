<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_user', function (Blueprint $table) {
            $table->id('admin_id');
            $table->text('name');
            $table->text('email');
            $table->text('password');
            $table->unsignedBigInteger('role');
            $table->unsignedBigInteger('access_level');
            $table->boolean('find_user');
            $table->text('profile')->nullable();
            $table->boolean('add_category');
            $table->boolean('ban_access');
            $table->boolean('access_everything');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_user');
    }
}
