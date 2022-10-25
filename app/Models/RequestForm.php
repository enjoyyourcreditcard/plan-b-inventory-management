<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestForm extends Model
{
    use HasFactory;

    protected $table = 'dbs_request_forms';
    protected $guarded = ['id'];

    public function part()
    {
        return $this->belongsTo(Part::class);
    }
    public function segment()
    {
        return $this->belongsTo(Segment::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function grf ()
    {
        return $this->belongsTo(Grf::class);
    }

    public function requestStocks ()
    {
        return $this->hasMany(RequestStock::class);
    }
}