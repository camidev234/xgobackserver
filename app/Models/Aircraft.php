<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aircraft extends Model
{
    use HasFactory;

    public function aircraft_seats() :HasMany {
        return $this->hasMany(Aircraft_seat::class);
    }
}
