<?php

use App\Models\Role;
use App\Models\User;
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
        $user = User::create([
            'username' => 'SuperAdmin',
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'superadmin@isp.com',
            'password' => bcrypt('admin123'),
            'gender' => '1',
            'phone' => '0123456789',
            'role_id' => '1',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
