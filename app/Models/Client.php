<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['idCafe', 'nom', 'numTable'];

    public function cafe()
    {
        return $this->belongsTo(Cafe::class, 'id');
    }
}
