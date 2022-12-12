<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Disposition extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('dispositions')->insert([
                'regarding' => Str::random(),
                'mail_origin' => Str::random(),
                'disposition_destination' => Str::random(),
                'disposition_content' => Str::random()
            ]);
        }
    }
}
