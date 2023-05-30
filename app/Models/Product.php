<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query)
    {
        if (request('name')) {
            $value = request('name');
            $query->where('name', 'like', "%$value%");
        }

        if (request('priceFrom') || request('priceTo')) {
            $query->where('price', '>=', request('priceFrom', 0))->where('price', '<=', request('priceTo', 9999999999));
        }

        if (request('category_id')) {
            if (request('category_id') !== 'all') {
                $query->where('category_id', request('category_id'));
            }
        }

        if (request('sort')) {
            if (request('sort') === 'up') {
                $query->orderBy('price');
            } else {
                $query->orderByDesc('price');
            }
        }

        return $query->get();
    }
}
