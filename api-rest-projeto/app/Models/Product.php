<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','size','type','description','image'];

    // Criando um Query Scope
    public function scopePorTipo($query, string $type)
    {
        return $query->where('type', $type);
    }
}
