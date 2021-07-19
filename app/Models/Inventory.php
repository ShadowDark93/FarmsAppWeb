<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    public function farm(){
        return $this->belongsTo(Farm::class, 'farms_id');
    }
    
    public function peso(){
        return $this->belongsTo(Peso::class, 'inventories_id');
    }

    protected $fillable = [
        'farms_id',
        'users_id',
        'InternalCode',
        'Category',
        'Sex',
        'Third',
        'ThirdName',
        'peso',
        'valor'
    ];

}