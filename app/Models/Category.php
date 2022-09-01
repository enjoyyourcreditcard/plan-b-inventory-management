<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $guarded = [
        'id'
    ];

    public function parts() {
        return $this->hasMany(Part::class);
    }

    public function brands() {
        return $this->hasMany(Brand::class);
    }
}
