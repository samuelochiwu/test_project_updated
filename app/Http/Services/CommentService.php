<?php

namespace App\Http\Services;


use App\Models\Comment; 
use App\Models\Article; 

class CommentService {

    public function createComment($articleId, $data) 
    {
        $article = Article::find($articleId);
        if (!$article) {
           return [];
        }
        $data['user_id'] = 1;

        return $article->comments()->create($data);
    //    return Comment::create($data);
    }
}