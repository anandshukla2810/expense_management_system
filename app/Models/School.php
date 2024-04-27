<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class School extends Model
{
    protected $fillable = [
        'name','abbreviation','logo','contact_name','email','phone','plan_type_id','user_id','created_by','status'
    ];

    public function plan_type(): BelongsTo {
        return $this->belongsTo(PlanType::class);
    }
}