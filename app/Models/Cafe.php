<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    protected $table = 'cafes';

    protected $fillable = ['idUser', 'nom', 'adresse', 'telephone', 'logo'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}


/*
class Cafe extends Model
{
    use HasFactory;
}
*/