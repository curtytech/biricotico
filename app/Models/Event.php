<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'banner',
        'external_link',
        'price',
        'date_open',
        'date_close',
        'time_open',
        'time_close',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}