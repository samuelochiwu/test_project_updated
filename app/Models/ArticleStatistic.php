<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article; 

class ArticleStatistic extends Model
{
    use HasFactory;

    protected $fillable = ['article_id', 'like_count', 'view_count'];
    
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

}
