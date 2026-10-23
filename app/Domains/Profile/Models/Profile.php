<?php

namespace App\Domains\Profile\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'status_pill',
        'email',
        'phone',
        'institution',
        'biography',
        'hero_description',
        'photo_path',
        'hero_photo_path',
        'hero_cta_primary_label',
        'hero_cta_primary_url',
        'hero_cta_secondary_label',
        'hero_metrics',
        'biography_photo_path',
        'biography_eyebrow',
        'biography_title',
        'biography_paragraphs',
        'qualifications',
        'expertise_tags',
        'is_active',
    ];

    protected $appends = [
        'photo_url',
        'hero_photo_url',
        'biography_photo_url',
    ];
    protected function casts(): array
    {
        return [
            'is_active'            => 'boolean',
            'hero_metrics'         => 'array',
            'biography_paragraphs' => 'array',
            'qualifications'       => 'array',
            'expertise_tags'       => 'array',
        ];
    }

    public function getPhotoUrlAttribute(): ?string
    {
        return $this->resolveImageUrl($this->photo_path);
    }

    public function getHeroPhotoUrlAttribute(): ?string
    {
        return $this->resolveImageUrl($this->hero_photo_path ?: $this->photo_path);
    }

    public function getBiographyPhotoUrlAttribute(): ?string
    {
        return $this->resolveImageUrl($this->biography_photo_path);
    }
    private function resolveImageUrl(?string $path): ?string
    {
        if (! $path) return null;
        
        if (str_starts_with($path, 'assets/')) {
            return asset($path);
        }

        // Mengembalikan URL ke route proxy
        return route('image.proxy', ['path' => $path]);
    }
}
