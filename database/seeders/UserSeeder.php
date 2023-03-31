<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'user_id' => Str::substr((Uuid::uuid4())->getHex(), 0, 16),
            'user_username' => 'admin',
            'password' => Hash::make('adminadmin'),
            'user_email' => 'mail@mail.com',
            'user_role_id' => 1,
            'user_status' => 1,
        ]);
    }
}
