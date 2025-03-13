<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',        // Adicionando user_id
        'subtotal',       // Outros campos
        'status',
        'payment_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);  // Aqui assume-se que 'user_id' é a chave estrangeira
    }
}
