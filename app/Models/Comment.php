<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'post_id', 'parent_id', 'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post_reply()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

}