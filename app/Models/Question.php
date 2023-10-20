<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Question extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
<<<<<<< HEAD
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search .  '%')
                ->orWhere('desc', 'like', '%' . $search . '%');
=======
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%'. $search. '%')
            ->orWhere('desc','like','%'. $search. '%');
>>>>>>> 71ac97238a24d04308916935d3de72e92bf8e11c
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
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