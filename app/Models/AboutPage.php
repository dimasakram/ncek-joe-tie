<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'history', 'vision', 'mission', 'core_values', 'cover_photo',
        'coffee_sourcing_title', 'coffee_sourcing_description', 'coffee_sourcing_image',
    ];

    public function getCoverPhotoUrlAttribute(): ?string
    {
        if (! $this->cover_photo) {
            return null;
        }

        return str_starts_with($this->cover_photo, 'http') ? $this->cover_photo : asset('storage/'.$this->cover_photo);
    }

    public function getCoffeeSourcingImageUrlAttribute(): ?string
    {
        if (! $this->coffee_sourcing_image) {
            return null;
        }

        return str_starts_with($this->coffee_sourcing_image, 'http') ? $this->coffee_sourcing_image : asset('storage/'.$this->coffee_sourcing_image);
    }
}