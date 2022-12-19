<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function grf ()
    {
        return $this->belongsTo(Grf::class);
    }

    public function irf ()
    {
        return $this->belongsTo(Irf::class);
    }

    public function inboundGrf ()
    {
        return $this->belongsTo(GrfInbound::class);
    }
}
