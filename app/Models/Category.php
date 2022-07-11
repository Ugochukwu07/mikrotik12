<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Category
 *
 * @mixin Eloquent
 */

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function account()
    {
        return $this->hasMany(Account::class);
    }
}
