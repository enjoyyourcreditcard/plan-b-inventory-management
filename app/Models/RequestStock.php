<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestStock extends Model
{
    use HasFactory;
    protected $table = 'request_stocks';
    protected $guarded = [
        'id'
    ];

    public function requestForm() {
        return $this->belongsTo(RequestForm::class);
    }


    public function part() {
        return $this->belongsTo(Part::class);
    }


    public function grf() {
        return $this->belongsTo(Grf::class);
    }

    public function stock() {
        return $this->belongsTo(Stock::class);
    }
}