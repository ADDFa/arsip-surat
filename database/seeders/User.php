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
        $role = ['admin', 'sekretaris', 'kepala-sekolah'];

        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name'      => fake()->name(),
                'avatar'    => 'samsudin.jpg',
                'role'      => $role[rand(0, 2)]
            ]);
        }
    }
}
