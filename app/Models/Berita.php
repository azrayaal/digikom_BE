<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    public $timestamps = false;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['tittle', 'banner', 'content', 'created_by'];
    protected $casts = [
        'created_at' => 'datetime', // Pastikan tanggal dikonversi ke objek Carbon
    ];
/*************  ✨ Codeium Command ⭐  *************/
/******  f0a99b16-3ddc-4fd2-a58a-7735d6547f6e  *******/
    public function creator()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}