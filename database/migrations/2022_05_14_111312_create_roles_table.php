<?php

use App\Models\Role;
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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string("role_name");
            $table->text("description")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Role::create([
            'role_name' => 'Manager',
        ]);

        Role::create([
            'role_name' => 'Courier',
        ]);

        Role::create([
            'role_name' => 'Normal User',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
