<?php

namespace App\Models;

use CodeIgniter\Model;

class Producto extends Model
{
    protected $table      = 'productos';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre', 'referencia', 'precio', 'peso',
        'categoria', 'stock', 'fecha'
    ];
}
