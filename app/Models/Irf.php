<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Irf extends Model
{
    use HasFactory;

    protected $table   = 'irfs';
    protected $guarded = ['id'];

    public function warehouse ()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function inbounds ()
    {
        return $this->hasMany(Inbound::class);
    }

    public function timelines ()
    {
        return $this->hasMany(Timeline::class);
    }
}
