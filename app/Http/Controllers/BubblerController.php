<?php

namespace App\Http\Controllers;

use App\Bubbler;
use App\Repositories\BubblerRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BubblerController extends Controller
{
    protected $bubblers;

    public function __construct(BubblerRepository $bubblers) {
        $this->bubblers = $bubblers;
    }

    public function index() {
        return response()->json($this->bubblers->all());
    }

    public function show($id) {
        return response()->json($this->bubblers->get($id));
    }


//
//    public function listIndex(Request $request) {
//        return view('bubblers.index', [
//            'bubblers' => $this->bubblers->all()
//        ]);
//    }
}
