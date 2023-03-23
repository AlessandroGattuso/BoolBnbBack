<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Position;


class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'indirizzo'  => 'Via Napoleone',
                'N_civico'   => 34,
                'Latitudine' => 42.632231,
                'Longitudine' => 13.267348,
                'città'       =>  'Milano',
                'Nazione'    => 'Italia',
                'apartment_id' => 1

            ],
            [
                'indirizzo'  => 'Viale traiano',
                'N_civico'   => 45,
                'Latitudine' => 78.453231,
                'Longitudine' => 27.39848,
                'città'       =>  'Roma',
                'Nazione'    => 'Italia',
                'apartment_id' => 2

            ]
        ];

        foreach($data as $item){
            $newPosition = new Position();
            
            $newPosition->indirizzo = $item['indirizzo'];
            $newPosition->N_civico = $item['N_civico'];
            $newPosition->Latitudine = $item['Latitudine'];
            $newPosition->Longitudine = $item['Longitudine'];
            $newPosition->città= $item['città'];
            $newPosition->Nazione= $item['Nazione'];
            $newPosition->apartment_id= $item['apartment_id'];

            $newPosition->save();
        }
    }
}
