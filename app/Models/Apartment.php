<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Apartment extends Model
{
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function services(){
        return $this->belongsToMany(Service::class);
    }
}
