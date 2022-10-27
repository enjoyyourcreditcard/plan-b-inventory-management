@section('title', 'Transaksi IC')
@extends('layouts.app') @section('content')
<div class="mt-14">
</div>
{{-- <div class="flex mb-10">
  <div class="flex-none w-20 mr-3 ">
    <div class="flex">
      <div class="flex-none w-5 h-5 bg-emerald-800 rounded-sm"> </div>
      <p class="flex-none ml-1.5">Success</p>
    </div>

  </div>
  <div class="flex-none w-20 mr-3">
    <div class="flex">
      <div class="flex-none w-5 h-5 bg-emerald-800 rounded-sm"> </div>
      <p class="flex-none ml-1.5">Success</p>
    </div>

  </div>
  <div class="flex-none w-20 mr-3">
    <div class="flex">
      <div class="flex-none w-5 h-5 bg-emerald-800 rounded-sm"> </div>
      <p class="flex-none ml-1.5">Success</p>
    </div>

  </div>
</div> --}}
<div class="mt-6 mb-3 grid grid-cols-12 sm:gap-10 intro-y">
  <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
    <div class="intro-y flex items-center h-10">
      <h2 class="text-lg font-medium truncate mr-5">Inbound</h2>
    </div>

    <div class="mt-5">
      @foreach ($requestForms as $item)

      <div class="intro-y">
        <a href="{{Route('transaction.ic.get.detail.grf', str_replace('/', '~', $item->grf_code))}}">
          <div class="box pr-4  mb-3 flex items-center zoom-in">
            <div class="bg-emerald-800	w-3 h-20 rounded-tl-md  rounded-bl-md 	">

            </div>
            <div class="ml-3.5 py-4 mr-auto">
              <div class="font-medium">{{$item->grf_code}}</div>
              <div class="text-slate-500 text-xs mt-0.5">{{$item->created_at->format('d-m-Y h:m:s')}}</div>
            </div>
            {{-- <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">Wh Approve
            </div> --}}
          </div>
        </a>

      </div>
      @endforeach

      <a href=""
        class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View
        More</a>
    </div>
  </div>
  <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
    <div class="intro-y flex items-center h-10">
      <h2 class="text-lg font-medium truncate mr-5">Outbound</h2>
    </div>

    <div class="mt-5">
    
      <a href=""
        class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View
        More</a>
    </div>
  </div>
  <div class="col-span-12 sm:col-span-6 md:col-span-4 py-6 sm:pl-5 md:pl-0 lg:pl-5 relative text-center sm:text-left">
    <div class="intro-y flex items-center h-10">
      <h2 class="text-lg font-medium truncate mr-5">Warehouse Transfer</h2>
    </div>

    <div class="mt-5">
    
      <a href=""
        class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View
        More</a>
    </div>
  </div>

</div>
@endsection