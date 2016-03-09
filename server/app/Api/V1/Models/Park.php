<?php

namespace App\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    public $timestamps = false;

    public function suburb() {
        return $this->belongsTo(Suburb::class);
    }

    public function bubblers() {
        return $this->hasMany(Bubbler::class);
    }
}
