<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Part extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function segment()
    {
        return $this->belongsTo(Segment::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function build()
    {
        return $this->hasMany(Build::class);
    }
    
    public function requestForms()
    {
        return $this->hasMany(RequestForm::class);
    }
    public function requestStocks()
    {
        return $this->hasMany(RequestStock::class);
    }
    public function requester()
    {
        return $this->hasMany(Request::class);
    }
    public function orderInbound()
    {
        return $this->hasMany(OrderInbound::class);
    }
}
