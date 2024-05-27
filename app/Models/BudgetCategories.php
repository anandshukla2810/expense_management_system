<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Finset;

class BudgetCategories extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo(BudgetCategories::class, 'parent_id');
    }

    public function finset() {
        return $this->belongsTo(Finset::class, 'finset_id');
        
    }
}
