<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    public function blogs(){
        return $this->belongsToMany(Blog::class,'section_blog');
    }
}
