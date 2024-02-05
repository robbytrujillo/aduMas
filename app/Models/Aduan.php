<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'slug',
        'kecamatan',
        'id_kecamatan',
        'desa_kelurahan',
        'isi_aduan',
        'status',
        'user_id',
    ];

    // Define relationship if necessary
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function status() {
        return $this->hasMany(AduanStatus::class, 'aduan_id');
    }
}
