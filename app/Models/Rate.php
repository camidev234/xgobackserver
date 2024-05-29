<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rate extends Model
{
    use HasFactory;

    public function target() :BelongsTo {
        return $this->belongsTo(Target::class);
    }

    public function aircraft_seats() :HasMany {
        return $this->hasMany(Aircraft_seat::class);
    }
}
