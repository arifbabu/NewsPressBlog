<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $guarded = ['create_at', 'updated_at', 'deleted_at'];
    use HasFactory, SoftDeletes;
    
    public function posts(){
        return $this->belongsToMany(Post::class);
     }
}
