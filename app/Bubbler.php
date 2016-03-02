<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Suburb;
use App\Park;
use App\Comment;
use App\Rating;

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
