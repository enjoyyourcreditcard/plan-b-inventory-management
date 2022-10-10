<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekondisi extends Model
{
    use HasFactory;

    protected $table = 'rekondisis';
    protected $guarded = ['id'];

    public function requestStock() {
        return $this->belongsTo(RequestStock::class);
    }
}
