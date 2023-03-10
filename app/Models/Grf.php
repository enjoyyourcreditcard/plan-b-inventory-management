<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grf extends Model
{
    use HasFactory;

    protected $table   = 'db_grfs';
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

    public function requestStocks ()
    {
        return $this->hasMany(RequestStock::class);
    }

    public function transferForms ()
    {
        return $this->hasMany(TransferForm::class);
    }

    public function stocks ()
    {
        return $this->hasMany(Stock::class);
    }

    public function timelines ()
    {
        return $this->hasMany(Timeline::class);
    }

    public function transferStock ()
    {
        return $this->hasMany(TransferStock::class);
    }
}
