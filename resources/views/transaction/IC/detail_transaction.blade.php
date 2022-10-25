@section('title', 'Request Approve IC')

@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="grid grid-cols-12 gap-4 mt-5">
        <div class="col-span-8">
            <div id="transaction-ic-form" data-grfcode="{{str_replace('/', '~', strtolower($grf->grf_code))}}"
                data-grf_id="{{$grf->id}}"></div>
        </div>
        <div class="col-span-4">
            <div id="transaction-stock-sidebar" data-grfcode="{{str_replace('/', '~', strtolower($grf->grf_code))}}">
            </div>
        </div>
    </div>

</div>





@endsection