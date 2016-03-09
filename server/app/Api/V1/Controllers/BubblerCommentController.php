<?php


namespace App\Api\V1\Controllers;

use App\Api\V1\Repositories\CommentRepository;
use App\Api\V1\Transformers\CommentTransformer;
use App\Http\Controllers\ApiController;
use App\Api\V1\Repositories\BubblerRepository;

class BubblerCommentController extends ApiController
{
    protected $bubblers, $comments;

    public function __construct(BubblerRepository $bubblers,
                                CommentRepository $comments) {
        $this->bubblers = $bubblers;
        $this->comments = $comments;
    }

    public function index($bubblerId)
    {
        $comments = $this->comments->forBubbler($bubblerId)->paginate(5);
        return $this->response->paginator($comments, new CommentTransformer);
    }
}