<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\View;


class Apartment extends Model
{
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function apartments()
	{
		return $this->hasMany(View::class);
	}

}
