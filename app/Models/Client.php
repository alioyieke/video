<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'website',
        'notes',
    ];

    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
