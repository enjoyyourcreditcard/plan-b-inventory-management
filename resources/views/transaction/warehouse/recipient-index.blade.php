@extends('layouts.app')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Inbound</a></li>
            <li class="breadcrumb-item active" aria-current="page">Penerima</li>
        </ol>
    </nav>
@endsection
@section('content')
    <h2 class="intro-y text-lg font-medium my-10">Inbound penerima</h2>
    <div id="inboundRecipient" class="table-responsive overflow-auto table-report -mt-2" data-warehouse_destination='{{ Auth::user()->warehouse->name }}'></div>
@endsection
