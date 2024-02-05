<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AduanStatus extends Model
{
    use HasFactory;

    protected $table = 'aduan_status';
    protected $fillable = ['aduan_id', 'status', 'daftar_desa', 'keterangan', 'user_id'];

    public function aduan() {
        return $this->belongsTo(Aduan::class, 'aduan_id');
    }

}
