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

    /* Calculate the rating */
    public function rating() {
        $ratings = $this->ratings()->get();
        $count = 0;
        $sum = 0;
        foreach ($ratings as $rating) {
            $count++;
            $sum += $rating->value;
        }
        return $count ? round($sum / $count, 1) : 0;
    }
}
