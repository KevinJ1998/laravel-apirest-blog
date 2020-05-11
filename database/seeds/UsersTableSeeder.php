<?php

use App\User;
use App\Category;
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

        $password = Hash::make('123123');
        User::create([
            'name' => 'Admin',
            'email' => 'admin@prueba.com',
            'password' => $password
        ]);


        // Crear usuarios para ejemplo
        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password
            ]);

            $user->categories()->saveMany(
                $faker->randomElements(
                    array(
                        Category::find(1),
                        Category::find(2),
                        Category::find(3)
                    ), $faker->numberBetween(1, 3), false )
            );
        }

    }
}
