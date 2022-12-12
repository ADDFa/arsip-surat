<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Credential extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('credentials')->insert([
                'username'  => fake()->userName(),
                'email'     => fake()->safeEmail(),
                'password'  => password_hash('password', PASSWORD_DEFAULT),
                'user_id'   => $i + 1
            ]);
        }
    }
}
