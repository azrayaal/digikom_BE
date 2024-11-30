<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    public $timestamps = false;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['nama_jabatan'];
    protected $casts = [
        'created_at' => 'datetime', // Pastikan tanggal dikonversi ke objek Carbon
    ];
}

