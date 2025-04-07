<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    use HasFactory;

    // Define o nome da tabela no banco de dados (caso necessário)
    protected $table = 'despesas';

    // Campos permitidos para preenchimento em massa
    protected $fillable = ['descricao', 'tipo', 'valor', 'data', 'user_id'];

    // Caso a tabela não tenha os campos created_at e updated_at, desative timestamps:
    public $timestamps = false;

    /**
     * Relacionamento: uma despesa pertence a um usuário.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
