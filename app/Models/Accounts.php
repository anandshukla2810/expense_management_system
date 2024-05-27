<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

    public function finset() {
        return $this->belongsTo(Finset::class, 'finset_id');
        
    }
}
