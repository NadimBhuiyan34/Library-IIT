<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin' => 'Admin',
            'teacher' => 'Teacher',
            'student' => 'Student',
        ];

        foreach ($roles as $code => $name) {
            Role::create(['code' => $code, 'name' => $name]);
        }
    }
}
