<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Links extends Model
{
    use HasFactory;

    protected $fillable = [
        'short_link', 'long_link', 'title'
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tags::class);
    }
}
