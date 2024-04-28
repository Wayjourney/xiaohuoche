<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = ['valid'];

    protected $hidden = ['user_id', 'operator_id'];


    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function operator(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
