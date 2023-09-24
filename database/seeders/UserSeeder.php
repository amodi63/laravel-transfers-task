<?php

namespace Database\Seeders;

use App\Models\Merchant;
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
        User::create([
            'first_name' => 'Mohammmed',
            'last_name' => 'Al Amoudi',
            'phone_number' => '0123456789',
            'address' => 'Gaza Strip',
            'type' => 'admin',
            'email' => 'moamoudi@gmail.ps',
            'id_no' => '123456789',
            'balance' => 100.000,
            'password' => Hash::make('password'),
        ]);
        Merchant::create([
            'first_name' => 'Mohammmed',
            'last_name' => 'Al Amoudi',
            'phone_number' => '0123456789',
            'address' => 'Gaza Strip',
            'account_number' => '123456789',
         
            'balance' => 0.000,
            'email' => 'merchant@gmail.ps',
            'password' => Hash::make('password'),

        ]);
       
    }
}
