<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SuperAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name" => 'superadmin',
                "telp" => '081234567890',
                "username" => 'superadmin',
                "password" => bcrypt('sumatera2023'),
                'raw_password' => '',
                "role" => "superadmin",
            ]
        ];

        foreach ($users as $key => $data) {
            User::create($data);
        }
    }
}
