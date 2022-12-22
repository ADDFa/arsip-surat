<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'sekretaris'];
        $users = [
            'admin'         => 1,
            'sekretaris'    => 2
        ];

        foreach ($roles as $role) {
            DB::table('users')->insert([
                'name'      => fake()->name(),
                'avatar'    => 'samsudin.jpg',
                'role'      => $role
            ]);
        }

        foreach ($users as $user) {
            DB::table('credentials')->insert([
                'username'  => fake()->userName(),
                'email'     => fake()->safeEmail(),
                'password'  => password_hash('password', PASSWORD_DEFAULT),
                'user_id'   => $user
            ]);
        }
    }
}
