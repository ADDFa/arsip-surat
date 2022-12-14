<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class IncomingMail extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('incoming_mails')->insert([
                'mail_number'       => Str::random(),
                'date'              => strtotime(now()),
                'mail_nature'       => Str::random(),
                'mail_category'     => Str::random(),
                'regarding_mail'    => Str::random(),
                'sender'            => Str::random()
            ]);
        }
    }
}
