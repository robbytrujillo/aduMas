<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'category_id', 'user_id', 'content', 'image', 'description'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    /**
     * user
     *
     * @return void
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * tags
     *
     * @return void
     */
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

}
