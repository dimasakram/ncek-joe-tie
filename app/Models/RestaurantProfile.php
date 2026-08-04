<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'history', 'vision', 'mission', 'core_values', 'logo', 'cover_photo',
        'address', 'phone', 'whatsapp', 'email', 'maps_embed_url',
        'instagram', 'facebook', 'opening_hours',
    ];
}
