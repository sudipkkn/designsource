<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = New User;
        $user->name = 'Webart Technology';
        $user->email = 'info@webart.technology';
        $user->password = Hash::make('1234');
        $user->save();
    }
}
