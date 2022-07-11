<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Ticket
 *
 * @mixin Eloquent
 */

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'message', 'status', 'priority', 'user_id', 'ticketId'];

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function generateRandomNumber() {
        $number = random_int(1000000000, 9999999999);
        if (self::where('ticketId', $number)->exists()) {
            return $this->generateRandomNumber();
        }
        return $number;
    }
}
