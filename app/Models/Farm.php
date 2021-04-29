<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    public function Inventories(){
        return $this->hasMany(Inventory::class);
    }

    protected $fillable = [
        'user_id',
        'AdminName',
        'Name',
        'Location',
        'Phone',
    ];
}
