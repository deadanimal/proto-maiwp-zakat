<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    public function pungutanzakat()
    {
        return $this->belongsTo(PungutanZakat::class);
    }

    public function penerimazakat() 
    {
        return $this->hasMany(PenerimaZakat::class);
    }
}
