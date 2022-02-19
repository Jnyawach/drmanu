<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable=[
        'blog_id','name','email','comment','review'
    ];

    public function blogs(){
        return $this->belongsTo(Blog::class);
    }

}
