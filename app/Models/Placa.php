<?php

namespace App\Models;

use App\Http\Controllers\CadastradosController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placa extends Model
{
    use HasFactory;

    protected $table = 'placas';

    protected $fillable = ['id_placa'];

    public function cadastrados(){

        return $this->hasMany(Cadastro::class);
    }
}
