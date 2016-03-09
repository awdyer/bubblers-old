<?php


namespace App\Api\V1\Repositories;

use App\Api\V1\Models\Comment;


class CommentRepository
{
    public function forBubbler($bubblerId) {
        return Comment::where('bubbler_id', '=', $bubblerId);
    }
}