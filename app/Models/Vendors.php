<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Finset;

class Vendors extends Model
{
    use HasFactory;

    /**
     * Get the finset that owns the Vendors
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function finset()
    {
        return $this->belongsTo(Finset::class, 'finset_id');
    }
}
