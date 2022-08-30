<?php

namespace App\Models;

use App\Models\Part;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function part() {
        return $this->belongsTo(Part::class);
    }
}
