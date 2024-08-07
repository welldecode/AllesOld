<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoists extends Model
{
    use HasFactory;
    protected $table = 'hoists';
    protected $fillable = [
        'model',
        'plate', 
    ];

}
