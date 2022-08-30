<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function stocks() {
        return $this->hasMany(Stock::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }
}
