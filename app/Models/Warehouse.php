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
        'wh_name',
        'regional',
        'kota',
        'location',
        'wh_type',
        'contract_status',
        'start_at',
        'end_at',
        'status',
    ];

    public function stocks() {
        return $this->hasMany(Stock::class);
    }
    
}

