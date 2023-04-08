<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $guarded = ['create_at', 'updated_at', 'deleted_at'];
    use HasFactory, SoftDeletes;


    public function tags(){
       return $this->belongsToMany(Tag::class);
    }
    public function categories(){
       return $this->belongsToMany(Category::class);
    }

    public function comments(){
      return $this->belongsToMany(Comment::class);
   }
}
