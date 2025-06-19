<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChapterImage extends Model
{
    protected $table = 'halaman';
    public $timestamps = false;
    
    protected $fillable = ['chapter_id','image_url','urutan'];
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}