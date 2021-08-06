<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaZakat extends Model
{
    use HasFactory;

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
