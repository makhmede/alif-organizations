<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FuelSensor extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name'
    ];

    public function vehicle():BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }
}
