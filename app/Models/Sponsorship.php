<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = ['titolo', 'prezzo', 'ore_valide'];

	use HasFactory;

	public function apartments()
	{
		return $this->belongsToMany(Apartment::class);
	}
}