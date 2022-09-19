<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class request extends Model
{
    use HasFactory;

    protected $table = 'db_requests';

    public function warehouse() {
        return $this->belongsTo(Warehouse::class);
    }

    public function part() {
        return $this->belongsTo(Part::class);
    }

    public function user() {
        return $this->belongsTo(User::class);    }
}
