<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function component(): HasOne
    {
        return $this->hasOne(Component::class, 'id', 'component_id');
    }
}
