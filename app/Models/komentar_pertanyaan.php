<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar_pertanyaan extends Model
{
    protected $guard = [];
    protected $table = 'komentar_pertanyaan';

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
