<?php

namespace App\Api\V1\Controllers;

use Illuminate\Http\Request;

use App\Api\V1\Repositories\BubblerRepository;
use App\Api\V1\Transformers\BubblerTransformer;
use App\Http\Requests;
use App\Http\Controllers\ApiController;


class BubblerController extends ApiController
{
    protected $bubblers;

    public function __construct(BubblerRepository $bubblers) {
        $this->bubblers = $bubblers;
    }

    public function index(Request $request) {
        if ($request->has('lat') && $request->has('long')) {
            // return all bubblers within optionally specified radius of latlong
            $latitude = $request->input('lat');
            $longitude = $request->input('long');
            $radius = $request->input('radius');
            return $this->bubblers->near($latitude, $longitude, $radius);
        } else {
            // return bubblers paginated in groups of no more than 100
            $limit = min(100, $request->input('limit', 100));
            $bubblers = $this->bubblers->paginated($limit);
            return $this->response->paginator($bubblers, new BubblerTransformer);
        }
    }

    public function show($id) {
        $bubblers = $this->bubblers->get($id);
        return $this->response->item($bubblers, new BubblerTransformer);
    }
}
