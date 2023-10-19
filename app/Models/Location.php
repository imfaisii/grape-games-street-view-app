<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'isFav',
        'Title',
        'category',
        'imgUrl',
        'isFav',
        'country',
        'city',
        'details',
        'category_id',
        'user_id'
    ];

    protected $hidden = ['user_id', 'created_at', 'updated_at'];

    protected $with = ['category'];

    protected $appends = ['image_url', 'thumbnail'];

    protected $casts = ['isFav' => 'boolean'];

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => url(Storage::url($this->imgUrl)),
        );
    }

    protected function thumbnail(): Attribute
    {
        return Attribute::make(
            get: fn () => url(Storage::url(Str::replace('.webp', '_thumb.webp', $this->imgUrl))),
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
