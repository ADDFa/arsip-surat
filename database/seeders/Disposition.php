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
        DB::table('dispositions')->insert([
            'regarding_mail' => Str::random(),
            'from_unit' => Str::random(),
            'disposition_destination' => Str::random(),
            'disposition_content' => Str::random(),
            'user_id' => 1,
            'incoming_mail_id' => 1
        ]);
    }
}
