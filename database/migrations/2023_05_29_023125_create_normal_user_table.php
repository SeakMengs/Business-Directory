<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNormalUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normal_user', function (Blueprint $table) {
            $table->id('normal_user_id');
            $table->text('name');
            $table->text('email');
            $table->text('password');

            // Role used to define user type
            // 1 = Normal User
            // 2 = Company User
            // 3 = Admin
            $table->tinyInteger('role')->default(1);
            $table->boolean('is_banned')->default(false);
            $table->unsignedBigInteger('ban_by_admin_id')->nullable();
            $table->text('profile_url')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

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
        Schema::dropIfExists('normal_user');
    }
}
