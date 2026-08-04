<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name', 'slug', 'description', 'composition',
        'price', 'image', 'is_best_seller', 'is_new', 'is_available', 'views',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'is_best_seller' => 'boolean',
            'is_new' => 'boolean',
            'is_available' => 'boolean',
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function promos()
    {
        return $this->hasMany(Promo::class);
    }

    public function relatedMenus()
    {
        return Menu::where('category_id', $this->category_id)
            ->where('id', '!=', $this->id)
            ->where('is_available', true)
            ->limit(4)
            ->get();
    }
}
