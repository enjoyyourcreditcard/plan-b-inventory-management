<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrfInbound extends Model
{
    use HasFactory;

    protected $table = 'inbound_grfs';
    protected $guarded = [
        'id'
    ];

    public function inboundForms ()
    {
        return $this->hasMany(OrderInbound::class);
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function warehouse ()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function timeline()
    {
        return $this->hasMany(Timeline::class);
    }
}
