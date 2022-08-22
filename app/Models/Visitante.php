<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\VisitantesController;

class Visitante extends Model
{
    use HasFactory;

    protected $table = 'visitantes';

    protected $fillable = ['placa', 'nome', 'mat_equip'];
}
