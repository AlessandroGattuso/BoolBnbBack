<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Sponsorship;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'titolo' => 'Basic',
                'prezzo' => 2.99,
                'ore_valide' => 24
            ], 
            [
                'titolo' => 'Standard',
                'prezzo' => 5.99,
                'ore_valide' => 72
            ], 
            [
                'titolo' => 'Premium',
                'prezzo' => 9.99,
                'ore_valide' => 144
            ]
        ];

        foreach($data as $item){

            $newSponsor = new Sponsorship();

            $newSponsor->titolo = $item['titolo'];
            $newSponsor->prezzo = $item['prezzo'];
            $newSponsor->ore_valide = $item['ore_valide'];

            $newSponsor->save();
        }
    }
}
