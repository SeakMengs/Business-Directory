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

            // Role used to define user type
            // 1 = Normal User
            // 2 = Company User
            // 3 = Admin
            $table->tinyInteger('role')->default(3);
            // Access level used to define admin access level
            $table->tinyInteger('access_level')->default(0);
            $table->text('profile_url')->nullable();
            $table->boolean('find_user')->default(false);
            $table->boolean('add_category')->default(false);
            $table->boolean('ban_access')->default(false);
            $table->boolean('access_everything')->default(false);
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
