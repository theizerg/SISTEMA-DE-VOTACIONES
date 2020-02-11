<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->nu_cedula = '25212293';
        $user->name = 'Luis';
        $user->last_name = 'Yustiz';
        $user->email = 'luisyustiz@gmail.com';
        $user->password = 'admin';
        $user->status = 1; // (1) active (0)disabled
        $user->save();

        $user->assignRole('administrador');

    }
}
