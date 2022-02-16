<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class News extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia,Sluggable,SluggableScopeHelpers;
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
        'status_id'

    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('imageCard')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('imageCard-icon')
                    ->height(300);
            });
    }
}
