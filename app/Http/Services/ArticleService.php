<?php

namespace App\Http\Services;


use App\Models\Article; 
use App\Models\ArticleStatistic; 

class ArticleService {

    public function createArticle($data) 
    {
        $data['user_id'] = 1;
       return Article::create($data);
    }

    public function getArticle($articleId) 
    {
       return Article::find($articleId);
    }

    public function getArticleStatistic($articleId) 
    {
       return ArticleStatistic::query()->where('article_id', $articleId)->first();
    }

    public function likeArticle($articleId) 
    {
        $article = $this->getArticle($articleId);
        if (!$article) {
            return [];
        }

       $articleStatistic = $this->getArticleStatistic($articleId);

       if(!$articleStatistic){
            ArticleStatistic::create([
                'article_id' => $articleId,
                'like_count' => 1,
                'view_count' => 0,
            ]);

            return [
                'article_id' => $articleId,
                'like_count' => 1,
                'view_count' => 0,
            ];
       }

       $articleStatistic->update([
        'like_count' => $articleStatistic->like_count + 1
       ]);

       return $articleStatistic;

    }


    public function viewArticle($articleId) 
    {
        $article = $this->getArticle($articleId);
        if (!$article) {
            return [];
        }

        $articleStatistic = $this->getArticleStatistic($articleId);

       if(!$articleStatistic){
        ArticleStatistic::create([
            'article_id' => $articleId,
            'like_count' => 0,
            'view_count' => 1,
        ]);

        return [
            'article_id' => $articleId,
            'like_count' => 0,
            'view_count' => 1,
        ];
       }

       $articleStatistic->update([
        'view_count' => $articleStatistic->view_count + 1
       ]);

       return $articleStatistic;

    }
    
}