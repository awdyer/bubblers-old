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

    public function index() {
        $bubblers = $this->bubblers->all();
        return $this->response->collection($bubblers, new BubblerTransformer);
    }

    public function show($id) {
        $bubblers = $this->bubblers->get($id);
        return $this->response->item($bubblers, new BubblerTransformer);
    }
}
