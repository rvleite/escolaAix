<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    use HasFactory;

    protected $fillable = ['name','codigocurso','motivo','inputCEP','inputAddress','bairro','complemento','inputCity','inputEstado','inputCurso','inputTurma','inputMatricula', 'file'];	
	protected $primaryKey = 'id';
}
