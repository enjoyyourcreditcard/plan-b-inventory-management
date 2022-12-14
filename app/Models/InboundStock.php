<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InboundStock extends Model
{
    use HasFactory;

    protected $table = 'inbound_stocks';

    protected $guarded = [
        'id'
    ];

    public function inbound() {
        return $this->belongsTo(Inbound::class);
    }
}
