<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{ 
    protected $primaryKey = 'idCategoria';
    protected $fillable = ['idCategoria', 'titulo','descripcion'];
}
