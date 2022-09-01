<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    use HasFactory;
    protected $table = 'builds';
    protected $guarded = [
        'id'
    ];

    public function part(){
        return $this->belongsTo(Part::class);
    }
}
