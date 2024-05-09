<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = new User();
        $user->name = 'Constantine';
        $user->email = 'gmta.constantine@gmail.com';
        $user->password = Hash::make('password');
        $user->save();
        $user->assignRole('admin');

        $user2 = new User();
        $user2->name = 'Mari';
        $user2->email = 'mari@bookvica.com';
        $user2->password = Hash::make('password');
        $user2->save();
        $user2->assignRole('operator');

        $user4 = new User();
        $user4->name = 'Tamo';
        $user4->email = 'tamo@bookvica.com';
        $user4->password = Hash::make('password');
        $user4->save();
        $user4->assignRole('operator');
    }


}
