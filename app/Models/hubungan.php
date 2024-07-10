<?php

namespace App\Models;

use Iluminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hubungan extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'thumbnail', 'content', 'link'];

    protected static function boot()
    {
        parent::boot();
        static::updating(function ($model){
            if ($model->isDirty('thumbnail') && ($model->getOriginal('thumbnail') !== null)) {
                storage::disk('public')->delet($model->getOriginal('thumbnail'));
            }
        });
    }
}
