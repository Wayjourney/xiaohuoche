<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Testing\Fluent\Concerns\Has;

class Income extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'operator_id', 'type', 'count'];
    protected $hidden = ['user_id', 'price_id', 'operator_id'];

    public function price(): BelongsTo {
        return $this->belongsTo(Price::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function operator(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
