<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = new User;
        $user->name = 'Nadim Bhuiyan';
        $user->email = 'nadim@gmail.com';
        $user->role = 'admin';
        $user->status = '1';
        $user->password = Hash::make('12345678');
        $user->save();

         DB::table('profiles')->insert([
            'user_id' => '1',
            
        ]);

    }
}
