<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'short_link', 'long_link', 'title'
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function linkStatistics()
    {
        return $this->hasMany(LinkStatistic::class);
    }

    public function sort($param = [["updated_at", "desc"]])
    {
          return  $this->linkStatistics
              ->sortBy($param)
              ->all();
    }
}
