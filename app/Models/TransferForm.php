<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferForm extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function part()
    {
        return $this->belongsTo(Part::class);
    }

    public function irf ()
    {
        return $this->belongsTo(Irf::class);
    }

    public function transferStocks ()
    {
        return $this->hasMany(TransferStock::class);
    }
}
