<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PungutanZakat extends Model
{
    use HasFactory;

    public function merchants() 
    {
        return $this->hasMany(Merchant::class);
    }

}
