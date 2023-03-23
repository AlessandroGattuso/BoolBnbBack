<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $message = [
            [
                'contenuto' => 'Lorem ipsum dolor sit amet, consectetur adipisci elit, sed do eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullamco laboriosam, nisi ut aliquid ex ea commodi consequatur.',
                'nome' => 'Rosa',
                'cognome' => 'Ceschi',
                'email' => 'rosa.ceschi@mail.com'
            ],
            [
                'contenuto' => 'Duis aute irure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'nome' => 'Francesco',
                'cognome' => 'Scotto',
                'email' => 'francesco.scotto@mail.com'
            ],
        ];

        foreach($message as $item){
            $newMessage = new Message();
            $newMessage->contenuto = $item['contenuto'];
            $newMessage->nome = $item['nome'];
            $newMessage->cognome = $item['cognome'];
            $newMessage->email = $item['email'];

            $newMessage->save();
        }
    }
}
