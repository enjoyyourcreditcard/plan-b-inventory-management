@extends('layouts.app')
@section('breadcrumb')
<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/user">Master</a></li>
        <li class="breadcrumb-item active" aria-current="page">User</li>
        <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
</nav>
@endsection
@section('content')
<!-- BEGIN: Form -->
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Edit User</h2>
</div>
<form action="{{ Route('user.update', ['id' => $user->id]) }}" method="POST">
    @csrf
    @method('put')
    <div class="intro-y box p-5 mt-5">
        <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 mr-2">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg> Form User
        </div>
        <div class="mt-5">
            {{-- Input Name --}}
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
                    <input id="name" type="text" class="form-control" placeholder="Username" name="name" value="{{ $user->name }}" required>
                </div>
            </div>
            {{-- Input Email --}}
            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label xl:w-64 xl:!mr-10">
                    <div class="text-left">
                        <div class="flex items-center">
                            <div class="font-medium">Email</div>
                            <div
                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                Required</div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                    <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ $user->email }}" required>
                </div>
            </div>
            {{-- Input Password VERY CONFIDENTIAL DATA --}}
            {{-- <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label xl:w-64 xl:!mr-10">
                    <div class="text-left">
                        <div class="flex items-center">
                            <div class="font-medium">Password</div>
                            <div
                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                Required</div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                    <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
            </div> --}}
            {{-- Input PIN VERY CONFIDENTIAL DATA --}}
            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label xl:w-64 xl:!mr-10">
                    <div class="text-left">
                        <div class="flex items-center">
                            <div class="font-medium">PIN</div>
                            <div
                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                Required</div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                    <input id="pin" type="number" class="form-control" placeholder="PIN" name="pin" required>
                </div>
            </div>
            {{-- Select Vendor --}}
            @if ($user->vendor_id != null)
            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label xl:w-64 xl:!mr-10">
                    <div class="text-left">
                        <div class="flex items-center">
                            <div class="font-medium">Vendor</div>
                        </div> 
                    </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                    <select id="vendor-select-input" class="tom-select" name="vendor_id">
                        @foreach ($vendor as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endif
            {{-- Select Role --}}
            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label xl:w-64 xl:!mr-10">
                    <div class="text-left">
                        <div class="flex items-center">
                            <div class="font-medium">Role</div>
                            <div
                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                Required</div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                    <select id="role" class="tom-select form-control" name="role" value="{{ $user->role }}" required>
                        <option value="requester" {{('requester' == $user->role) ? 'selected' : ''}}>Requester</option>
                        <option value="admin" {{('admin' == $user->role) ? 'selected' : ''}}>Admin</option>
                        {{-- <option value="audit">Audit</option> --}}
                        <option value="warehouse" {{('warehouse' == $user->role) ? 'selected' : ''}}>Warehouse</option>
                        <option value="inventory_control" {{('inventory_control' == $user->role) ? 'selected' : ''}}>IC</option>
                    </select>
                </div>
            </div>
            {{-- Select Regional --}}
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
                    <select id="regional" class="tom-select form-control" name="regional" value="{{ $user->regional }}" required>
                        <option value="Jakarta 1" {{('Jakarta 1' == $user->regional) ? 'selected' : ''}}>Jakarta 1</option>
                        <option value="Jakarta 2" {{('Jakarta 2' == $user->regional) ? 'selected' : ''}}>Jakarta 2</option>
                        <option value="Jakarta 3" {{('Jakarta 3' == $user->regional) ? 'selected' : ''}}>Jakarta 3</option>
                        <option value="Surabaya" {{('Surabaya' == $user->regional) ? 'selected' : ''}}>Surabaya</option>
                        <option value="Medan" {{('Medan' == $user->regional) ? 'selected' : ''}}>Medan</option>
                        <option value="Bandung" {{('Bandung' == $user->regional) ? 'selected' : ''}}>Bandung</option>
                        <option value="Semarang" {{('Semarang' == $user->regional) ? 'selected' : ''}}>Semarang</option>
                        <option value="Malang" {{('Malang' == $user->regional) ? 'selected' : ''}}>Malang</option>
                        <option value="SUMATERA 1" {{('SUMATERA 1' == $user->regional) ? 'selected' : ''}}>SUMATERA 1</option>
                        <option value="SUMATERA 2" {{('SUMATERA 2' == $user->regional) ? 'selected' : ''}}>SUMATERA 2</option>
                        <option value="JAWA TENGAH" {{('JAWA TENGAH' == $user->regional) ? 'selected' : ''}}>JAWA TENGAH</option>
                        <option value="KALIMANTAN" {{('KALIMANTAN' == $user->regional) ? 'selected' : ''}}>KALIMANTAN</option>
                        <option value="JATIM, BALI & NT" {{('JATIM, BALI & NT' == $user->regional) ? 'selected' : ''}}>JATIM, BALI & NT</option>
                        <option value="SULAMPA" {{('SULAMPA' == $user->regional) ? 'selected' : ''}}>SULAMPA</option>
                        <option value="Others" {{('Others' == $user->regional) ? 'selected' : ''}}>Others</option>
                    </select>
                </div>
            </div>
            {{-- Select Warehouse --}}
            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label xl:w-64 xl:!mr-10">
                    <div class="text-left">
                        <div class="flex items-center">
                            <div class="font-medium">Warehouse</div>
                            <div
                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                Required</div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                <select id="warehouse" class="tom-select form-control" name="warehouse_id" value="{{ $user->warehouse_id }}">
                        @foreach ($warehouse as $item)
                        <option value="{{$item->id}}" {{($item->id == $user->warehouse_id) ? 'selected' : ''}}>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- Input NIK --}}
            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label xl:w-64 xl:!mr-10">
                    <div class="text-left">
                        <div class="flex items-center">
                            <div class="font-medium">NIK</div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                    <input id="nik" type="number" class="form-control" placeholder="Nomor NIK" name="nik" value="{{ $user->nik }}">
                </div>
            </div>
            {{-- Input Telepon --}}
            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label xl:w-64 xl:!mr-10">
                    <div class="text-left">
                        <div class="flex items-center">
                            <div class="font-medium">No.Telepon</div>
                            <div
                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                Required</div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                    <input id="no_telp" type="text" class="form-control" placeholder="Nomor Telepon" name="no_telp" value="{{ $user->no_telp }}" required>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-end flex-row gap-2 mt-5">
        <a type="button" href="/user" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 md:w-52">Cancel</a>
        <button type="submit" class="btn py-3 btn-primary md:w-52">Save</button>
    </div>
</form>
<!-- END: Form -->
@endsection