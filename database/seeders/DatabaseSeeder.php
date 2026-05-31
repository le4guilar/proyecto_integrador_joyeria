<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([RolSeeder::class]); //llama al seeder de roles
        $this->call([ProvinciaSeeder::class]); //llama al seeder de provincias
        $this->call([CiudadSeeder::class]); //llama al seeder de ciudades
        $this->call([DomicilioSeeder::class]); // llama al seeder de domicilios
        $this->call([UserSeeder::class]); // llama al seeder de usuarios
        $this->call([GeneroJoyaSeeder::class]); // llama al seeder de generos de joya
        $this->call([CategoriaJoyaSeeder::class]); // llama al seeder de categorias de joyas
    }
}
