<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    /** @use HasFactory<\Database\Factories\ProgramFactory> */
    use HasFactory, SoftDeletes;

    protected static function booted()
    {
        static::saving(function ($program) {
            if (empty($program->slug) || $program->isDirty('title')) {
                $program->slug = Str::slug($program->title);
            }
        });
    }

    protected $fillable = [
        'title',
        'slug',
        'description',
        'user_id',
        'category_id',
        'duration',
        'type',
        'programStart',
        'registerDate',
        'closedDate',
        'is_open',
        // Keeping old columns per user request
        'user_joined',
        'rating',
        'thumbnail',
        'country_code',
        'discount',
        'price',
    ];

    public function getFlagAttribute(): string
    {
        if (!$this->country_code) {
            return '';
        }

        return "https://flagsapi.com/{$this->country_code}/flat/64.png";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function requirements()
    {
        return $this->hasMany(ProgramRequirement::class);
    }

    public function benefits()
    {
        return $this->hasMany(ProgramBenefit::class);
    }

    public function thumbnails()
    {
        return $this->hasMany(ProgramThumbnail::class);
    }

    public function steps()
    {
        return $this->hasMany(ProgramStep::class);
    }
}
