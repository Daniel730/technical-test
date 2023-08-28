<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;

    protected $table = 'inspections';

    protected $fillable = [
        'turbine_id',
        'component_id',
        'grade',
    ];

    public $timestamps = true;
}
