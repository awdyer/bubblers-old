<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Bubbler;

class Rating extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function bubbler() {
        return $this->belongsTo(Bubbler::class);
    }
}
