<?php

namespace App\Models;

use App\Models\Part;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestForm extends Model
{
    use HasFactory;
    protected $table = 'dbs_request_forms';
    protected $guarded = [
        'id'
    ];

    protected function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function part()
    {
        return $this->belongsTo(Part::class);
    }
}
