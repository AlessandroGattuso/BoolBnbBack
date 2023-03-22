<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Appartment;

class view extends Model
{
    use HasFactory;

    public function user()
	{
		return $this->belongsTo(Apartment::class);
	}
}
