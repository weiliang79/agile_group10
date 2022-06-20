<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //manager
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

        //courier1
        $user = User::create([
            'username' => 'Courier1',
            'first_name' => 'Courier1',
            'last_name' => 'Courier1',
            'email' => 'courier1@isp.com',
            'password' => bcrypt('courier123'),
            'gender' => '1',
            'phone' => '0123456789',
        ]);

        $user->role()->associate(Role::ROLE_COURIER);
        $user->save();

        //courier2
        $user = User::create([
            'username' => 'Courier2',
            'first_name' => 'Courier2',
            'last_name' => 'Courier2',
            'email' => 'courier2@isp.com',
            'password' => bcrypt('courier123'),
            'gender' => '1',
            'phone' => '0123456789',
        ]);

        $user->role()->associate(Role::ROLE_COURIER);
        $user->save();

        //courier3
        $user = User::create([
            'username' => 'Courier3',
            'first_name' => 'Courier3',
            'last_name' => 'Courier3',
            'email' => 'courier@isp.com',
            'password' => bcrypt('courier123'),
            'gender' => '1',
            'phone' => '0123456789',
        ]);

        $user->role()->associate(Role::ROLE_COURIER);
        $user->save();

        //normal user
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
}
