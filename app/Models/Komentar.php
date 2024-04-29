<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'fotoId',
        'userId',
        'komentar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function foto()
    {
        return $this->belongsTo(Foto::class, 'fotoId');
    }
}
