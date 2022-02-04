<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $primaryKey = 'idPedido';
    protected $fillable = ['idPedido', 'idCliente','direccion','metodoEnvio','metodoPago','total'];
}
