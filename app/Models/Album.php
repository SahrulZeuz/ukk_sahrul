<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $timestamps = false;
    protected $table = 'album';
    protected $primaryKey = 'id';
    protected $fillable = [
        'namaAlbum',
        'deskripsi',
        'tanggalDibuat',
        'userId',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function foto()
    {
        return $this->belongsTo(Foto::class,'fotoId', 'id');
    }
}
