@extends('layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Warehouse</a></li>
            <li class="breadcrumb-item active" aria-current="page">Warehouse Transfer</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h2 class="intro-y text-lg font-medium my-10">Warehouse Transfer</h2>
    <div id="listTransfer" class="table-responsive overflow-auto table-report -mt-2" data-warehouse_id='{{ Auth::user()->warehouse_id }}'></div>
@endsection
