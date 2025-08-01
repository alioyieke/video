<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'video_url',
        'image',
        'category',
        'client_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
