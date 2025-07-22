<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'website',
        'message',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
