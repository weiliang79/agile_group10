<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('first_name');
            $table->string("last_name");
            $table->text("address");
            $table->string("postcode");
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
<<<<<<< HEAD:database/migrations/2014_10_12_000000_create_users_table.php
            $table->string('address');
            $table->rememberToken();
            $table->timestamps();

=======
            $table->tinyInteger('gender');
            $table->string('phone');
            $table->foreignId("role_id");
            $table->foreign("role_id")->references("id")->on("roles")->onDelete("cascade");
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
>>>>>>> wei-liang:database/migrations/2022_05_14_111314_create_users_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
