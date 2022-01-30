<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';
    protected $fillable = ['judul', 'isi', 'user_id', 'tag_id'];
    use HasFactory;

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'pertanyaan_id');
    }

    public function tepat()
    {
        return $this->hasOne(Jawaban::class, 'id', 'jawaban_id');
    }

    public function tags()
    {
        return $this->belongsTo(Tag::class, 'tag_id', 'id');
    }

}
