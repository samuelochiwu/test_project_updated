<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment; 

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'article_id', 'subject', 'body'];
    
    public function comments()
    {
        return $this->belongsTo(Article::class);
    }
}
