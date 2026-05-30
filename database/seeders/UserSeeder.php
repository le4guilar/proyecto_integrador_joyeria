<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
        public function run(): void
    {
        //usuario admin
        User::create([
            'nombre' => 'Nombre Admin',
            'apellido' => 'Administrador',
            'email' => 'admin@mail.com',
            'password' => '1234',
            'rol_id' => '1',
            'domicilio_id' => '1',
        ]);


        //usuario cliente
        User::create([
            'nombre' => 'Nombre Cliente',
            'apellido' => 'Cliente',
            'email' => 'cliente@mail.com',
            'password' => '1234',
            'domicilio_id' => '2',
            'rol_id' => '2',
        ]);
    }
}
