<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use App\Models\View;


class Apartment extends Model
{
	protected $fillable = [
		'user_id',
		'descrizione',
		'numero_di_stanze',
		'numero_di_bagni',
		'numero_di_letti',
		'metri_quadri',
		'cover',
		'visible',
		'prezzo',
		'slug'
	];

	public static function generateSlug($title){
        return Str::slug($title, '-');
    }

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function apartments()
	{
		return $this->hasMany(View::class);
	}

	public function services()
	{
		return $this->belongsToMany(Service::class);
	}

	public function sponsorships()
	{
		return $this->belongsToMany(Sponsorship::class);
	}

	public function messages()
	{
		return $this->hasMany(Message::class);
	}

	public function position()
    {
        return $this->hasOne(Position::class);
    }
}
