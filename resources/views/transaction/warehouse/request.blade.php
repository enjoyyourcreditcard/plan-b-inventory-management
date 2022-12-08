
@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Warehouse Approv</a></li>
    </ol>
</nav>
@endsection

@section('content')
<h2 class="intro-y text-lg font-medium mt-10">Warehouse Approve</h2>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div id="warehouse-transaction-request" data-wh_id={{Auth::user()->warehouse_id}} class="intro-y col-span-12 overflow-auto lg:overflow-visible"></div>
</div>
@endsection