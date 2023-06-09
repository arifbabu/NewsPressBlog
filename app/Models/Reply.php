<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $guarded = ['created_at', 'deleted_at', 'updated_at'];

    public function comment(){
        return $this->belongsTo(Comment::class);
     }
}
