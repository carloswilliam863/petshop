<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = ['cliente_id', 'total_vendido'];

 
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

  
    public function products()
    {
        return $this->belongsToMany(Product::class, 'venda_produtos')
                    ->withPivot('quantidade', 'preco_unitario')
                    ->withTimestamps();
    }
}





