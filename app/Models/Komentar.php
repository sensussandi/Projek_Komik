<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $table= 'Komentar';
    protected $fillable = [
        'user_id',
        'komik_id',
        'isi_komentar',
    ];
    protected $casts = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comic()
    {
        return $this->belongsTo(Comic::class, 'komik_id');
    }
    public $timestamps = false;

}
