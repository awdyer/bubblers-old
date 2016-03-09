<?php

namespace App\Api\V1\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Comment extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function bubbler() {
        return $this->belongsTo(Bubbler::class);
    }
}
