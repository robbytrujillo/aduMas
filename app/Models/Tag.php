<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug'
    ];

    
    /**
     * posts
     *
     * @return void
     */
    public function posts() {
        return $this->belongsToMany(Post::class);
    }

    public function aduans() {
        return $this->belongsToMany(Aduan::class);
    }
}
