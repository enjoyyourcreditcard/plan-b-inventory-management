<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stock;

class Warehouse extends Model
{
    use HasFactory;
    
    protected $table = 'db_warehouses_function';
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
    
}

