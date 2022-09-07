<?php

namespace App\Services;

use App\Models\RequestForm;
use App\Models\Part;
use Illuminate\Http\Request;

class RequestFormService
{

    public function __construct(RequestForm $requestForm)
    {
        $this->requestForm = $requestForm;
    }

    // Request Form GET
    public function handleAllRequestForm()
    {
        $requestForm = $this->requestForm->all();
        return ($requestForm);
    }

    // Request Form STORE 
    public function handleStoreRequestForm($request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
        ]);
        for ($i = 0; $i < count($request->part_id); $i++) {
            $validatedData['part_id'] = $request->part_id[$i];
            $validatedData['quantity'] = $request->quantity[$i];
            if ($request->remarks[$i] == null) {
                $validatedData['remarks'] = '';
            }else{
                $validatedData['remarks'] = $request->remarks[$i];
            }
            $this->requestForm->create($validatedData);
        };
        return ('Data has been stored');
    }
}
