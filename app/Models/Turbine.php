<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Turbine extends Model
{
    use HasFactory;

    protected $table = 'turbines';

    protected $fillable = [
        'user_id',
        'location',
    ];

    public $timestamps = true;

    function inspection(): HasMany
    {
        return $this->hasMany(Inspection::class);
    }
}
