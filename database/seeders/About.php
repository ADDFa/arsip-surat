<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class About extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abouts')->insert([
            'telephone_number'      => '0736-7310228',
            'email'                 => 'smandelbengkulu@gmail.com',
            'address'               => 'Jl. WR Supratman, No.18 Rt.007, Pematang Gubernur, Kecamatan Muara Bangkahulu',
            'head_master'           => 'Hidayatul Mardiah',
            'nip'                   => '1771074110790001'
        ]);
    }
}
