@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{Route('category.get.view')}}">Master</a></li>
        <li class="breadcrumb-item active" aria-current="page">Category</li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
@endsection

@section('content')

<!-- BEGIN: Form -->
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Update Category</h2>
</div>
<form action="{{ Route('category.post.update', ['id' => $category->id])  }}" method="post">
    @csrf
    @method('put')
    <div class="intro-y box p-5 mt-5">
        {{-- <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5"> --}}
            <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 mr-2">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg> Form Category
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
                        <input id="categoryName" type="text" class="form-control uppercase" name="name" required value="{{ $category->name }}">
                    </div>
                </div>

                {{-- Description input --}}
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Description</div>
                                <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <textarea class="form-control" id="categoryDescription" rows="3" name="description" required>{{ $category->description }}</textarea>
                    </div>
                </div>
    
                {{-- Category Select --}}
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Uom</div>
                                <div
                                    class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                    Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <select id="category_id" class="tom-select" name="uom[]" required multiple="multiple">
                            <option {{ (collect($category->uom)->contains('meter')) ? 'selected':'' }} value="meter">Meter</option>
                            <option {{ (collect($category->uom)->contains('set')) ? 'selected':'' }} value="set">Set</option>
                            <option {{ (collect($category->uom)->contains('each')) ? 'selected':'' }} value="each">Each</option>
                            <option {{ (collect($category->uom)->contains('roll')) ? 'selected':'' }} value="roll">Roll</option>
                            <option {{ (collect($category->uom)->contains('unit')) ? 'selected':'' }} value="unit">Unit</option>
                            <option {{ (collect($category->uom)->contains('batang')) ? 'selected':'' }} value="batang">Batang</option>
                            <option {{ (collect($category->uom)->contains('liter')) ? 'selected':'' }} value="liter">Liter</option>
                            <option {{ (collect($category->uom)->contains('kaleng')) ? 'selected':'' }} value="kaleng">Kaleng</option>
                            <option {{ (collect($category->uom)->contains('kg')) ? 'selected':'' }} value="kg">Kg</option>
                            <option {{ (collect($category->uom)->contains('kubic')) ? 'selected':'' }} value="kubic">Kubic</option>
                            <option {{ (collect($category->uom)->contains('pack')) ? 'selected':'' }} value="pack">Pack</option>
                        </select>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    </div>
    <div class="flex justify-end flex-row gap-2 mt-5">
        <a type="button" href="{{Route('category.get.view')}}" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 md:w-52">Cancel</a>
        {{-- <button type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 md:w-52">Save &amp; Add New Product</button> --}}
        <button type="submit" class="btn py-3 btn-primary md:w-52">Save</button>
    </div>
</form>
<!-- END: Form -->

@endsection