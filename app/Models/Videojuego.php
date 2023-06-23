<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    use HasFactory;
    //Campos rellenables
    protected $fillable = [
        'isan',
        'titulo',
        'imagen',
        'desarrollador',
        'distribuidor',
        'genero',
        'precio',
        'año'
    ];
    
    
}
