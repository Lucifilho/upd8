<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'cpf',
        'nome',
        'dataNasc',
        'sexo',
        'cidade',
        'estado',
        'endereco',

    ];

    protected $casts = [

        'items' => 'array'
    ];

    protected $dates = ['date'];

    protected $guarded = [];



}
