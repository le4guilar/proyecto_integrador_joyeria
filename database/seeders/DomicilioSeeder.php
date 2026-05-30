<?php

namespace Database\Seeders;

use App\Models\Domicilio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DomicilioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //domicilio del admin
        Domicilio::create([
            'detalle_domicilio' => 'Calle Admin 123',
            'ciudad_id' => '7'
        ]);


        //domicilio del cliente
        Domicilio::create([
            'detalle_domicilio' => 'Calle Cliente 123',
            'ciudad_id' => '7'
        ]);
    }
}
