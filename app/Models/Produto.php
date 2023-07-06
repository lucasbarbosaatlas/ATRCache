<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'preco'];

    function categorias() {
        return $this->belongsToMany('App\Models\Categoria', 'produto_categorias');
    }
}
