<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['idCafe', 'name', 'price', 'logo'];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id');
    }
}
