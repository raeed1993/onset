<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\Entities\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin admin ',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
        $user->attachRole('super_admin');

        // $user = User::create([
        //     'name' => 'Super Admin',
        //     'email' => 'super@test.com',
        //     'password' => bcrypt('12345'),
        //     'role' => 'super'
        // ]);
        // $user->attachRole('super_admin');

        // $user = User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@test.com',
        //     'password' => bcrypt('12345'),
        //     'role' => 'admin'
        // ]);
        //     $user->attachRole('admin');

        // $user = User::create([
        //     'name' => 'Accountant',
        //     'email' => 'accountant@test.com',
        //     'password' => bcrypt('12345'),
        //     'role' => 'accountant'
        // ]);
        // $user->attachRole('admin');

        // $user = User::create([
        //     'name' => 'Call Center',
        //     'email' => 'callcenter@test.com',
        //     'password' => bcrypt('12345'),
        //     'role' => 'call center'
        // ]);
        // $user->attachRole('admin');

        // $user = User::create([
        //     'name' => 'Delivery',
        //     'email' => 'delivery@test.com',
        //     'password' => bcrypt('12345'),
        //     'role' => 'delivery'
        // ]);
        // $user->attachRole('admin');
    }


    // end of run

}

//end of seeder
