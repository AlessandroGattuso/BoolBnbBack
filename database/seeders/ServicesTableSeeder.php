<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = ['Wi-fi', 'Lavatrice', 'Aria condizionata', 'Spazio di lavoro dedicato', 'Asciugacapelli', 'Cucina', 'Asciugatrice', 'Riscaldamento', 'TV', 'Ferro da stiro', 'Piscina', 'Parcheggio gratuito nella proprietà', 'Culla', 'Griglia per barbecue', 'Camino', 'Idromassaggio', 'Postazione di ricarica per veicoli elettrici', 'Palestra', 'Colazione', 'E\' permesso fumare'];

        foreach($services as $service) {
            $newService = new Service();
            $newService->nome = $service;

            $newService->save();
        }
    }
}
