<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    /** @use HasFactory<\Database\Factories\PartnershipFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'url_link',
        'url_image',
    ];
}
