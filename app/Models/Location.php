<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get all of the computer for the Location
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function computer()
    {
        return $this->hasMany(Computer::class);
    }
}
