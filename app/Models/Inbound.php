<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbound extends Model
{
    use HasFactory;

    protected $table = 'inbounds';

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
