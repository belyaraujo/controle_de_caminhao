<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CadastrosController;

class Cadastro extends Model
{
    use HasFactory;

    protected $table = 'caminhao';

    protected $fillable = ['placa','mat_equip'];

}
