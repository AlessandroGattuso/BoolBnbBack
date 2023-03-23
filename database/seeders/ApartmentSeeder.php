<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Apartment;


class ApartmentSeeder extends Seeder
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
				'descrizione' => 'Appartamento con due camere letto',
				'slug' => 'appartamento-con-due-camere-letto',
				'stanze' => 2,
				'bagni' => 1,
				'mq' => 72,
				'cover' => '',
				'visible' => true,
				'prezzo' => 59,
				'user_id' => 1
			],
			[
				'descrizione' => 'Appartamento in centro',
				'slug' => 'appartamento-in-centro',
				'stanze' => 1,
				'bagni' => 1,
				'mq' => 65,
				'cover' => '',
				'visible' => true,
				'prezzo' => 64,
				'user_id' => 1
			]
		];

		foreach ($data as $item) {

			$newApartment = new Apartment();

			$newApartment->descrizione = $item['descrizione'];
			$newApartment->slug = $item['slug'];
			$newApartment->numero_di_stanze = $item['stanze'];
			$newApartment->numero_di_bagni = $item['bagni'];
			$newApartment->metri_quadri = $item['mq'];
			$newApartment->cover = $item['cover'];
			$newApartment->visible = $item['visible'];
			$newApartment->prezzo = $item['prezzo'];
			$newApartment->user_id = $item['user_id'];

			$newApartment->save();
		}
	}
}
