<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BudgetCategories;

class Transactions extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(BudgetCategories::class, 'category_id');
    }
}
