<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['indirizzo','N_civico','Latitudine','Longitudine','città','CAP','Nazione','apartment_id'];
    use HasFactory;

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
