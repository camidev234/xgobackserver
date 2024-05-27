<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolesDefault = [
            [
                'role_name' => 'SuperUser'
            ],
            [
                'role_name' => 'Administrator'
            ],
            [
                'role_name' => 'User'
            ]
        ];

        DB::table('roles')->insert($rolesDefault);
    }
}
