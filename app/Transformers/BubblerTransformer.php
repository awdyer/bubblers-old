<?php


namespace app\Transformers;

use App\Bubbler;
use League\Fractal;

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
            ]
        ];
    }
}