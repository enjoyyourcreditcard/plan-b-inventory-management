@extends('layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Warehouse</a></li>
            <li class="breadcrumb-item active" aria-current="page">Warehouse Recipient Transfer</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h2 class="intro-y text-lg font-medium my-10">Warehouse Transfer</h2>
    <div id="listRecipient" class="table-responsive overflow-auto table-report -mt-2" data-warehousedestination='{{ Auth::user()->warehouse->name }}'></div>
@endsection
