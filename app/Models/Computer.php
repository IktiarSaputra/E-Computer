<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    protected $guarded = [''];

    /**
     * Get the location that owns the Computer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    // public function setNetworkAttribute($value)
    // {
    //     $this->attributes['network'] = json_encode($value);
    // }

    // public function getNetworkAttribute($value)
    // {
    //     return $this->attributes['network'] = json_decode($value);
    // }
}
