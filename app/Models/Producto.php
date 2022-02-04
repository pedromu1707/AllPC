<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
   use HasFactory;
    protected $primaryKey = 'idProducto';
    protected $fillable = ['idProducto', 'titulo', 'idMarca', 'descripcion','idCategoria','precioUnidad','unidadesDispo','imagen','oferta','destacado','estado'];
    
    
    
}

