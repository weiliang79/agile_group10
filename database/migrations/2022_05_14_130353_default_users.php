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
            'username' => 'Manager',
            'first_name' => 'Manager',
            'last_name' => 'Manager',
            'email' => 'manager@isp.com',
            'password' => bcrypt('manager123'),
            'gender' => '1',
            'phone' => '0123456789',
        ]);

        $user->role()->associate(Role::ROLE_MANAGER);
        $user->save();

        $user = User::create([
            'username' => 'Courier',
            'first_name' => 'Courier',
            'last_name' => 'Courier',
            'email' => 'courier@isp.com',
            'password' => bcrypt('courier123'),
            'gender' => '1',
            'phone' => '0123456789',
        ]);

        $user->role()->associate(Role::ROLE_COURIER);
        $user->save();

        $user = User::create([
            'username' => 'NormalUser',
            'first_name' => 'Normal',
            'last_name' => 'User',
            'email' => 'normaluser@isp.com',
            'password' => bcrypt('normaluser123'),
            'gender' => '1',
            'phone' => '0123456789',
        ]);

        $user->role()->associate(Role::ROLE_NORMAL_USER);
        $user->save();

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
