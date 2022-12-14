@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Transaction</a></li>
        <li class="breadcrumb-item active" aria-current="page">Inbound</li>
    </ol>
</nav>
@endsection

@section('content')
<h2 class="intro-y text-lg font-medium mt-10 mb-4">Inbound Master</h2>
<div class="grid grid-cols-12 gap-4 w-full">
    <div class="intro-y col-span-12 xl:col-span-4 lg:col-span-12 md:col-span-12 sm:col-span-12">
        <div class="box p-5 rounded-md">
            <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                <div class="font-medium text-base truncate">Excel</div>
            </div>
            <div class="font-medium ">
                <a href="/inbound/excel" class="btn !bg-slate-100 whitespace-nowrap text-emerald-900 rounded-full w-full transition duration-200 ease-in-out hover:text-emerald-800 hover:!bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-diff w-4 h-4 mr-2" viewBox="0 0 16 16">
                        <path d="M8 5a.5.5 0 0 1 .5.5V7H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V8H6a.5.5 0 0 1 0-1h1.5V5.5A.5.5 0 0 1 8 5zm-2.5 6.5A.5.5 0 0 1 6 11h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                    </svg>
                    <span>Template Excel</span>
                </a>
                </br>
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#inbound-post-excel-modal"
                    class="btn !bg-emerald-900 whitespace-nowrap text-white rounded-full mt-3 w-full transition duration-200 ease-in-out hover:!bg-emerald-800">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel w-4 h-4 mr-2" viewBox="0 0 16 16">
                        <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                      </svg>
                    <span>Import Excel</span>
                </a>
            </div>
        </div>
    </div>

    <div class="intro-x col-span-12 xl:col-span-8 lg:col-span-12 md:col-span-12 sm:col-span-12 flex flex-col" style="max-height: 70vh">
        <div class="mb-4 flex-grow overflow-auto">
            <table class="table table-report relative">
                <thead>
                    <tr>
                        <th class="whitespace-normal sticky top-0 z-50 bg-slate-100">Part</th>
                        <th class="whitespace-normal sticky top-0 z-50 bg-slate-100">Brand</th>
                        <th class="whitespace-normal sticky top-0 z-50 bg-slate-100 text-right">Quantity</th>
                        <th class="whitespace-normal sticky top-0 z-50 bg-slate-100 text-right">Nomor PO</th>
                        <th class="whitespace-normal sticky top-0 z-50 bg-slate-100 text-right">Warehouse</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $inbounds as $inbound )
                    <tr class="intro-x {{ $inbound->irf->status == 'on_progress' ? null : '!opacity-40' }}">
                        <td class="ml-2 mr-6 text-left font-bold">{{ $inbound->part->name }}</td>
                        <td class="text-left">{{ $inbound->brand }}</td>
                        <td class="text-right">{{ $inbound->quantity . ' ' . $inbound->part->uom }}</td>
                        <td class="text-right underline decoration-dotted">{{ $inbound->nomor_po }}</td>
                        <td class="text-right">
                            <span class="bg-slate-100 text-emerald-800 py-1 px-4 rounded-lg">{{ $inbound->warehouse->name }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="12">No item on the list</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
<!-- END: Data List -->
</div>

{{-- *
*|--------------------------------------------------------------------------
*| Modal Confirmation
*|--------------------------------------------------------------------------
*--}}
<div id="inbound-post-excel-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-spreadsheet mx-auto mt-3 text-emerald-900" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                        <path d="M8 11h8v7h-8z"></path>
                        <path d="M8 15h8"></path>
                        <path d="M11 11v7"></path>
                    </svg>
                </div>
                <form action="{{Route('inbound.post.excel.import')}}" method="POST" enctype="multipart/form-data" class="px-5">
                    @csrf
                    <div class="mb-3">
                        <label>Warehouse</label>
                        <select name="warehouse_id" data-placeholder="Select warehouse to store" class="tom-select w-full" required>
                            @foreach ($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-center items-center w-full mb-3">
                        <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer hover:bg-gray-100">
                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet mb-3 w-10 h-10 text-gray-400" viewBox="0 0 16 16">
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z" />
                                </svg>
                                <div class="dropzone-check">
                                    <p class="mb-2 text-sm text-gray-500">
                                        <span class="font-semibold">Click to upload</span>
                                    </p>
                                    <p class="text-xs text-center text-gray-500">Excel file</p>
                                </div>
                            </div>
                            <input id="dropzone-file" name="excel" type="file" class="hidden" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                            <input type="hidden" name="irf_code" value="{{ $irfCode }}">
                            <div class="bulk-hidden"></div>
                        </label>
                    </div>
                    <div class="modal-footer flex gap-2 justify-center items-center">
                        <a data-tw-dismiss="modal" class="btn !bg-zinc-200 !text-zinc-900 rounded-full px-8">Cancel</a>
                        <button type="submit" class="btn !bg-emerald-900 !text-zinc-200 rounded-full px-8">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javaScript')
    <script src="{{ Asset('js/transaction/inbound/script.js') }}"></script>
@endsection