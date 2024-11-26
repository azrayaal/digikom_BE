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
    public function creator()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }
}