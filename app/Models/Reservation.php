<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';

    protected $fillable = ['idCafe', 'idClient'];

    public function cafe()
    {
        return $this->belongsTo(Cafe::class, 'id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'id');
    }
}
