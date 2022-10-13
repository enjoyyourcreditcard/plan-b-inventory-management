<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferStock extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function transferForm() {
        return $this->belongsTo(TransferForm::class);
    }

    public function grf() {
        return $this->belongsTo(Grf::class);
    }

    public function part() {
        return $this->belongsTo(Part::class);
    }
}
