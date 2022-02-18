<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Blog extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Sluggable, SluggableScopeHelpers;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable=[
        'title',
        'content',
        'tags',
        'summary',
        'user_id',
        'imageAlt',
        'imageTitle',
        'status_id',
        'imageCredit',
        'category_id'

    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function sections(){
        return $this->belongsToMany(Section::class,'section_blog');
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('imageCard')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('imageCard-icon')
                    ->width(380);
                $this->addMediaConversion('blog-thumb')
                    ->width(650);
            });
    }
}
