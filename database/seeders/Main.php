<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Main extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            OutgoingMail::class,
            IncomingMail::class,
            User::class,
            About::class
        ]);
    }
}
