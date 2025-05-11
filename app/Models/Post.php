<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id');
    }
    
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
