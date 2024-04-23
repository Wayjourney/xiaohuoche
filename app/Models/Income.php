<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Income extends Model
{
    use HasFactory;

    protected $hidden = ['user_id', 'price_id'];

    public function price(): BelongsTo {
        return $this->belongsTo(Price::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

}
