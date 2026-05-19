<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LocalPost extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'category',
        'status',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public static function slugColumn(): string
    {
        return 'slug';
    }

    public function scopePublished($query, $type = null)
    {
        return $query->where('status', 'publish')
            ->where(function ($q) {
                $q->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }

    // WordPress-compat accessors so existing views work unchanged
    public function getPostTitleAttribute(): string
    {
        return $this->title ?? '';
    }

    public function getPostNameAttribute(): string
    {
        return $this->slug ?? '';
    }

    public function getPostDateAttribute()
    {
        return $this->published_at ?? $this->created_at;
    }

    public function getPostContentAttribute(): string
    {
        return $this->content ?? '';
    }

    public function getPostExcerptAttribute(): string
    {
        return $this->excerpt ?? '';
    }

    public function getExcerptAttribute(): string
    {
        if (!empty($this->attributes['excerpt'])) {
            return $this->attributes['excerpt'];
        }

        $text = strip_tags($this->content ?? '');
        $text = html_entity_decode($text);
        $text = preg_replace('/\s+/', ' ', $text);

        return strlen($text) > 200 ? substr($text, 0, 197) . '...' : $text;
    }

    protected static function booted(): void
    {
        static::creating(function (self $post) {
            if (empty($post->slug) && !empty($post->title)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }
}
