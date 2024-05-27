<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultUser = new User();

        $defaultUser->name = "Admin";
        $defaultUser->last_name = "Plattform";
        $defaultUser->email = "adminUserxgo@xgo.com.co";
        $defaultUser->password = "xgo2024*";
        $defaultUser->number_document = "000000000";
        $defaultUser->role_id = 1;

        $defaultUser->save();
    }
}
