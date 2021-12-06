<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'created_at',
        'updated_at',
        'national_number',
        'complained',
        'phone_number',
        'procedure' ,
        'behave',
        'note',
        'filenames','action','complainer_name'
       
    ];
    protected $casts = [
       
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',

    ];
}
