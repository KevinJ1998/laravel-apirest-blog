<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla
        User::truncate();
        $faker = \Faker\Factory::create();

        // crear la misma clave para todos los usuarios es conveniente para
        // que el seeder no se vuelva lento

        $password = Hash::make('12345');
        User::create([
            'name' => 'Admin',
            'email' => 'admin@prueba.com',
            'password' => $password
        ]);


        // Crear usuarios para ejemplo
        for($i = 0;$i < 10; $i++ ){
            User::create([
                'name' => $faker -> name,'email'=> $faker -> email, 'password' => $password
            ]);
        }
    }
}
