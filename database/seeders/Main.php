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
            DatabaseSeeder::class,
            Disposition::class,
            OutgoingMail::class,
            IncomingMail::class,
            Credential::class,
            About::class
        ]);
    }
}
