<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

    public function post(){
        // return $this->belongsToMany(Post::class);
        return $this->belongsTo(Post::class);
     }

    public function replies(){
        return $this->belongsToMany(Reply::class);
     }
}
