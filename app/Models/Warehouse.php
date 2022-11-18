<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stock;

class Warehouse extends Model
{
    use HasFactory;
    
    protected $table = 'warehouse';
    protected $fillable = [
        'name',
        'regional',
        'city',
        'location',
        'type',
        'contract_status',
        'tenggat_waktu',
        'start_at',
        'end_at',
        'lat',
        'lng',
        'status',
    ];

    public function stocks() {
        return $this->hasMany(Stock::class);
    }

    public function grfs() {
        return $this->hasMany(Grf::class);
    }

    public function grfInbound() {
        return $this->hasMany(GrfInbound::class);
    }

    public function inbound() {
        return $this->hasMany(OrderInbound::class);
    }
    
    public function requester(){
        return $this->hasMany(Request::class);
    }
}

