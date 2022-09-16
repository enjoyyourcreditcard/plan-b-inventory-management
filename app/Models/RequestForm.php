<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestForm extends Model
{
    use HasFactory;

    protected $table = 'dbs_request_forms';

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function part()
    {
        return $this->belongsTo(Part::class, 'part_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
