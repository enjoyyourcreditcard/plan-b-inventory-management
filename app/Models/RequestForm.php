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

    public function grf ()
    {
        return $this->belongsTo(Grf::class);
    }

    
}