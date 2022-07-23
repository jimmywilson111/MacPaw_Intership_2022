<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsteroidsNeoWs extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'reference', 'name', 'speed', 'is_hazardous'];

    public $timestamps = false;
}
