<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\View;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $view = [
            [
                'IP' => '100.200.8.5',
                'apartment_id' => 1
            ],
            [
                'IP' => '27.21.151.1',
                'apartment_id' => 1
            ],
        ];

        foreach($view as $item){
            $newView = new View();
            $newView->apartment_id = $item['apartment_id'];
            $newView->IP = $item['IP'];

            $newView->save();
        }

    }
}
