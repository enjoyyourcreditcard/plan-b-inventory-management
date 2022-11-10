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
{{-- ! --}}
<h2 class="intro-y text-lg font-medium my-10">Warehouse Transfer</h2>
{{-- ! --}}
    {{--  --}}
    <div class="table-responsive overflow-auto">
        <table class="table table-report -mt-2">
            <thead>
                
                <tr>
                    <th class="">GRF</th>
                    <th class="">FROM WAREHOUSE</th>
                    <th class="">TO WAREHOUSE</th>
                    <th class="">REQUEST AT</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transferform as $item)
                <tr class="intro-x">
                    <td class="text-emerald-900 text-xs">
                        <a href="" class="underline underline-offset-4 text-emerald-900">
                                {{ $item->grf_code}}
                        </a>
                    </td>
                    <td class="text-emerald-900 text-xs">{{ $item->warehouse->name }}</td>
                    <td class="text-emerald-900 text-xs">{{ $item->warehouse_destination }}</td>
                    <td class="text-emerald-900 text-xs">{{ $item->created_at->format("D - M - Y") }}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    {{--  --}}
@endsection
