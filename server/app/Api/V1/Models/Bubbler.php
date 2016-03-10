<?php

namespace App\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    /* Return whether bubbler is within `radius` km of a lat/long */
    public function near($latitude, $longitude, $radius = 10) {
        $query = 'select ( '.
                  '(select point(longitude, latitude) from bubblers where id = ?) '.
                  '<@> '.
                  '(select point(?, ?)) '.
              ') as miles';
        $result = DB::select($query, [$this->id, $longitude, $latitude]);
        $miles = $result[0]->miles;
        $km = $miles * 1.609344;
        return $km <= $radius;
    }
}
