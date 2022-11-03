<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CadastroController;

class Cadastro extends Model
{
    use HasFactory;

    protected $table = 'caminhao';

    protected $fillable = ['id','id_placa','mat_equip','mat_equip2'];

    public function placas(){

        return $this->belongsTo(Placa::class, 'id_placa', 'id');
        }


           /* public function cadastro(){

                return $this->hasOne(Cadastro::class, 'id_caminhao', 'id');
            }*/

}
