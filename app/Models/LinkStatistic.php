<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_agent', 'user_ip', 'link_id'
    ];

    public function links()
    {
        return $this->belongsTo(Link::class);
    }
}
