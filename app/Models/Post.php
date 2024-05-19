<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    protected $with = ['category', 'author', 'region', 'status'];

    protected $casts = [
        'images' => 'array'
    ];

    public function scopeFilter($query, array $filters){

        $query->when($filters['search']??false, function($query, $search) {
            return $query->where('title','like','%'.$search.'%')
            ->orWhere('body','like','%'.$search.'%');
        });

        $query->when($filters['region']??false, function($query, $region) {
            return $query->whereHas('region', function($query) use($region){
                $query->where('slug',$region);
            });
        });

        $query->when($filters['category']??false, function($query, $category) {
            return $query->whereHas('category', function($query) use($category){
                $query->where('slug',$category);
            });
        });

        $query->when($filters['status']??false, function($query, $status) {
            return $query->whereHas('status', function($query) use($status){
                $query->where('slug',$status);
            });
        });

        $query->when($filters['author']??false, function($query, $author) {
            return $query->whereHas('author', function($query) use($author){
                $query->where('username',$author);
            });
        });

    }

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}