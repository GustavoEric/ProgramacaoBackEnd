<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens; 

class User extends Model
{
    use HasFactory,HasApiTokens;
    protected $fillable = ['address_id', 'cpf', 'name', 'phone', 'email', 'password'];

    public $timestamps = false;
}
