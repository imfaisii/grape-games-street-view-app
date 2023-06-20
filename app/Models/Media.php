<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'file', 'user_id'];

    protected $appends = ['file_url'];

    protected function getFileUrlAttribute()
    {
        return Storage::disk('public')->url($this->file);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
