<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    
    protected $guarded = [
        'id'
    ];
    
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function segment() {
        return $this->belongsTo(Segment::class);
    }

    public function parts() {
        return $this->hasMany(Part::class);
    }

    public function requestForms() {
        return $this->hasMany(RequestForm::class);
    }
}
