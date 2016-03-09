<?php


namespace App\Api\V1\Transformers;

use League\Fractal;

use App\Api\V1\Models\Bubbler;

class BubblerTransformer extends Fractal\TransformerAbstract
{
    public function transform(Bubbler $bubbler) {
        return [
            'id' => $bubbler->id,
            'description' => $bubbler->description,
            'latitude' => $bubbler->latitude,
            'longitude' => $bubbler->longitude,
            'park' => [
                'id' => $bubbler->park->id,
                'name' => $bubbler->park->name
            ],
            'suburb' => [
                'id' => $bubbler->park->suburb->id,
                'name' => $bubbler->park->suburb->name
            ],
            'rating' => $bubbler->rating()
        ];
    }
}