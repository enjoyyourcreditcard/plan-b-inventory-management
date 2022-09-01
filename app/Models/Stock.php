<?php

namespace App\Models;

use App\Models\Part;

use App\Models\Warehouse;
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

    public function warehouse() {
        return $this->belongsTo(Warehouse::class);
    }


}
