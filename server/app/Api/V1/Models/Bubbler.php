<?php

namespace App\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Bubbler extends Model
{
    public function park() {
        return $this->belongsTo(Park::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function ratings() {
        return $this->hasMany(Rating::class);
    }
}
