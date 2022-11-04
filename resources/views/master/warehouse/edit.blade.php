@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{Route('warehouse.get.view')}}">Master</a></li>
        <li class="breadcrumb-item active" aria-current="page">Warehouse</li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
@endsection

@section('content')

<!-- BEGIN: Form -->
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Update Warehouse</h2>
</div>
<form action="{{ Route('warehouse.post.update', ['id' => $warehouse->id]) }}" method="post">
    @csrf
    @method('put')
    <div class="intro-y box p-5 mt-5">
        {{-- <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5"> --}}
            <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 mr-2">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg> Form Warehouse
            </div>
            <div class="mt-5">
    
                {{-- Name input --}}
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Name</div>
                                <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="" type="text" class="form-control" name="name" required value="{{ $warehouse->name }}">
                    </div>
                </div>

                {{-- Regional Select --}}
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Regional</div>
                                <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <select id="" class="tom-select" name="regional" value="{{ $warehouse->regional }}">
                            <option value="Jabodetabek" {{($warehouse->regional == 'Jabodetabek') ? 'selected' : ''}}>Jabodetabek</option>
                            <option value="Jakarta" {{($warehouse->regional == 'Jakarta') ? 'selected' : ''}}>Jakarta</option>
                            <option value="Surabaya" {{($warehouse->regional == 'Surabaya') ? 'selected' : ''}}>Surabaya</option>
                            <option value="Medan" {{($warehouse->regional == 'Medan') ? 'selected' : ''}}>Medan</option>
                            <option value="Bandung" {{($warehouse->regional == 'Bandung') ? 'selected' : ''}}>Bandung</option>
                            <option value="Semarang" {{($warehouse->regional == 'Semarang') ? 'selected' : ''}}>Semarang</option>
                            <option value="Malang" {{($warehouse->regional == 'Malang') ? 'selected' : ''}}>Malang</option>
                            <option value="SUMATERA 1" {{($warehouse->regional == 'SUMATERA 1') ? 'selected' : ''}}>SUMATERA 1</option>
                            <option value="SUMATERA 2" {{($warehouse->regional == 'SUMATERA 2') ? 'selected' : ''}}>SUMATERA 2</option>
                            <option value="JAWA TENGAH" {{($warehouse->regional == 'JAWA TENGAH') ? 'selected' : ''}}>JAWA TENGAH</option>
                            <option value="KALIMANTAN" {{($warehouse->regional == 'KALIMANTAN') ? 'selected' : ''}}>KALIMANTAN</option>
                            <option value="JATIM, BALI & NT" {{($warehouse->regional == 'JATIM, BALI & NT') ? 'selected' : ''}}>JATIM, BALI & NT</option>
                            <option value="SULAMPA" {{($warehouse->regional == 'SULAMPA') ? 'selected' : ''}}>SULAMPA</option>
                            <option value="Others" {{($warehouse->regional == 'Others') ? 'selected' : ''}}>Others</option>
                        </select>
                    </div>
                </div>

                {{-- Kota input --}}
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Kota</div>
                                <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="" type="text" class="form-control" name="city" required value="{{ $warehouse->city }}">
                    </div>
                </div>
                
                {{-- Location input --}}
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Location</div>
                                <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <textarea class="form-control" id="" rows="3" name="location" required>{{ $warehouse->location }}</textarea>
                    </div>
                </div>

                {{-- Type input --}}
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Type</div>
                                <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="" type="text" class="form-control" name="type" required value="{{ $warehouse->type }}">
                    </div>
                </div>

                {{-- Constract Status Select --}}
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Contract Status</div>
                                <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <select id="" class="tom-select" name="contract_status" value="{{ $warehouse->contract_status }}">
                            <option value="Contract" {{($warehouse->contract_status == 'Contract') ? 'selected' : ''}}>Contract</option>
                            <option value="Permanent" {{($warehouse->contract_status == 'Permanent') ? 'selected' : ''}}>Permanent</option>
                        </select>
                    </div>
                </div>

                {{-- Expire input --}}
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Expire</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="" type="text" class="form-control" name="expire" value="{{ $warehouse->expire }}">
                    </div>
                </div>

                {{-- Start At input --}}
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Start At</div>
                                <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="" type="date" class="form-control" name="start_at" required value="{{ $warehouse->start_at }}">
                    </div>
                </div>

                {{-- End At input --}}
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">End At</div>
                                <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="" type="date" class="form-control" name="end_at" required value="{{ $warehouse->end_at }}">
                    </div>
                </div>

                {{-- Lat input --}}
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Lat</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="" type="text" class="form-control" name="lat" value="{{ $warehouse->lat }}">
                    </div>
                </div>

                {{-- Lng input --}}
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Lng</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="" type="text" class="form-control" name="lng" value="{{ $warehouse->lng }}">
                    </div>
                </div>
                    
            </div>
        {{-- </div> --}}
    </div>
    <div class="flex justify-end flex-row gap-2 mt-5">
        <a type="button" href="{{Route('warehouse.get.view')}}" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 md:w-52">Cancel</a>
        {{-- <button type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 md:w-52">Save &amp; Add New Product</button> --}}
        <button type="submit" class="btn py-3 btn-primary md:w-52">Save</button>
    </div>
</form>
<!-- END: Form -->

@endsection