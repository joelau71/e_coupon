<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            // "name" => "joelau",
            "first_name" => "joe",
            "last_name" => "lau",
            "gender" => "m",
            "birthday" => now(),
            "mobile" => 12345678,
            "is_admin" => true,
            "email" => "joe.lau@hypthon.com",
            "password" => bcrypt("password"),
            "created_at" => now(),
            "updated_at" => now()
        ]);

        $client = User::create([
            "first_name" => "mandy",
            "last_name" => "tsang",
            "gender" => "f",
            "birthday" => now(),
            "mobile" => 12345678,
            "email" => "mandy.tsang@hypthon.com",
            "password" => bcrypt("password"),
            "created_at" => now(),
            "updated_at" => now()
        ]);
        $client->score()->create();
    }
}
