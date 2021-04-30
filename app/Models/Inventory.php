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

    protected $fillable = [
        'farms_id',
        'users_id',
        'InternalCode',
        'Category',
        'Sex',
        'Third',
        'ThirdName',
    ];

}
