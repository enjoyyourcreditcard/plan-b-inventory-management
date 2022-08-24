<?php

namespace App\Services;

use App\Models\Historyprice;
use Illuminate\Http\Request;
// use App\Services\HistorypriceService;
use Illuminate\Support\Facades\Validator;

class HistorypriceService
{

    public function __construct(Historyprice $hp)
    {
        $this->hp = $hp;
    }
    
    public function handleIndex()
    {
        $hps = $this->hp->all();

        return($hps);
    }

    public function handleStore(Request $request)
    {
        $this->hp->create($request->all());
        return redirect('/detail/part');
    }

}
