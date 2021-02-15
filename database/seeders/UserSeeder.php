<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Provider\en_US\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'email@example.com',
            'password' => '123453asdasd'
        ]);
    }
}
