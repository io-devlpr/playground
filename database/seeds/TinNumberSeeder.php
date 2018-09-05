<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TinNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // store generate $number number of data
        factory(\App\CompanyTin::class, 5)->create();
    }
}
