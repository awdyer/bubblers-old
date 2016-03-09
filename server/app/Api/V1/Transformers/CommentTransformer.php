<?php


namespace App\Api\V1\Transformers;

use League\Fractal;

use App\Api\V1\Models\Comment;

class CommentTransformer extends Fractal\TransformerAbstract
{
    public function transform(Comment $comment)
    {
        return [
            'id' => $comment->id,
            'text' => $comment->text
        ];
    }
}