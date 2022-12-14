@extends('layouts.app')
@section('breadcrumb')
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Inbound</a></li>
        </ol>
    </nav>
@endsection
@section('content')
    <h2 class="intro-y text-lg font-medium my-10">Inbound</h2>
    <div id="inboundRecipient" class="table-responsive overflow-auto table-report -mt-2" data-warehouseid="{{ Auth::user()->warehouse_id }}"></div>
@endsection
