<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInbound extends Model
{
    use HasFactory;
 
    protected $guarded = ['id'];
    
    public function inbound() {
        return $this->belongsTo(Inbound::class);
    }

    public function warehouse() {
        return $this->belongsTo(Warehouse::class);
    }

    public function part()
    {
        return $this->belongsTo(Part::class);
    }
}
