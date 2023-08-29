<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turbine extends Model
{
    use HasFactory;

    protected $table = 'turbines';

    protected $fillable = [
        'user_id',
        'location',
    ];

    public $timestamps = true;
}
