<?php

namespace App\Http\Controllers;

use App\Bubbler;
use App\Repositories\BubblerRepository;
use App\Transformers\BubblerTransformer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class BubblerController extends ApiController
{
    protected $bubblers;

    public function __construct(BubblerRepository $bubblers) {
        $this->bubblers = $bubblers;
    }

    public function index() {
        return $this->response->collection($this->bubblers->all(), new BubblerTransformer);
    }

    public function show($id) {
        return $this->response->item($this->bubblers->get($id), new BubblerTransformer);
    }
}
