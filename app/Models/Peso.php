<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peso extends Model
{
    use HasFactory;

    public function inventories(){
        return $this->hasMany(Inventory::class);
    }

    protected $fillable = [
        'inventories_id',
        'NombrePesador', 
        'peso', 
        'valor'
    ];
}