<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grf extends Model
{
    use HasFactory;

    protected $table = 'db_grfs';
    protected $guarded = ['id'];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function warehouse ()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function requestForms ()
    {
        return $this->hasMany(RequestForm::class);
    }
}
