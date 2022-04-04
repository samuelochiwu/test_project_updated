<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment; 
use App\Models\ArticleStatistic; 

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'body'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function articleStatistic()
    {
        return $this->hasOne(ArticleStatistic::class);
    }
}
