<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    // Define o nome da tabela no banco de dados
    protected $table = 'despesas';

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = ['descricao', 'tipo', 'valor', 'data'];
}
