<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ArticleService; 
use App\Http\Requests\StoreArticleRequest; 
use App\Http\Resources\ArticleResource; 
use App\Models\Article;

class ArticleController extends Controller
{

    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ArticleResource::collection(Article::with('comments')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $article = $this->articleService->createArticle($request->validated());
        return response(['data' => new ArticleResource($article)], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = $this->articleService->getArticle($id);
        if(!$article) {
            return response(['data' => "Not found for this article Id: $id"], 404);
        }
        return response(['data' => new ArticleResource($article)], 200);
    }

    public function likeArticle($id)
    {
        $article = $this->articleService->likeArticle($id);
        if(!$article) {
            return response(['data' => "Not found for this article Id: $id"], 404);
        }
        return response(['data' => $article], 200);
    }

    public function viewArticle($id)
    {
        $article = $this->articleService->viewArticle($id);
        if(!$article) {
            return response(['data' => "Not found for this article Id: $id"], 404);
        }
        return response(['data' => $article], 200);
    }
}
