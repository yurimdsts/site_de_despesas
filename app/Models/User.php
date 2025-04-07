<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory;

    // Campos permitidos para preenchimento em massa
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Relacionamento: um usuário pode ter muitas despesas.
     */
    public function despesas(): HasMany
    {
        return $this->hasMany(Despesa::class);
    }
}
