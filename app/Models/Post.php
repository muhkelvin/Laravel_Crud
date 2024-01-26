<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'detail',
        'image',
        'body',
        'category_id'
    ];

    public function Category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
