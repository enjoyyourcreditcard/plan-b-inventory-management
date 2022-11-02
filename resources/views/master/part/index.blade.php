@extends('layouts.app')
@section('breadcrumb')

<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Master</a></li>
        <li class="breadcrumb-item active" aria-current="page">Part</li>
    </ol>
</nav>
@endsection
@section('content')
<h2 class="intro-y text-lg font-medium mt-10">Master Part</h2>

<div class="grid grid-cols-12 gap-6 mt-5">


    <div id="master-parts" class="intro-y col-span-12 overflow-auto lg:overflow-visible"></div>



</div>



<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Terms of Service
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    With less than a month to go before the European Union enacts new consumer privacy laws for its
                    citizens, companies around the world are updating their terms of service agreements to comply.
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is
                    meant to ensure a common set of data rights in the European Union. It requires organizations to
                    notify users as soon as possible of high-risk data breaches that could personally affect them.
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button data-modal-toggle="defaultModal" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                    accept</button>
                <button data-modal-toggle="defaultModal" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
        </div>
    </div>
</div>



{{-- *
*|--------------------------------------------------------------------------
*| Modal Delete Confirmation
*|--------------------------------------------------------------------------
*--}}
<div id="part-delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot
                        be undone.</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <form action="{{Route('part.post.deactive')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="part_id_delete">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-danger w-24">Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


{{-- *
*|--------------------------------------------------------------------------
*| Modal Add Part
*|--------------------------------------------------------------------------
*--}}
<div id="superlarge-modal-size-preview" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('part.store')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Create Part</h2>
                    <button class="btn btn-outline-secondary hidden sm:flex">
                        <i data-lucide="file" class="w-4 h-4 mr-2"></i>
                    </button>

                    {{-- <button type="button" data-tw-dismiss="modal"
                        class="btn btn-outline-secondary w-20 mr-1">Cancel</button> --}}

                </div>
                <div class="modal-body" style="overflow-y: scroll; height: 80vh;">
                    <div class="row">
                        <div class="mb-2">
                            <label for="crud-form-1" class="form-label">Part Name</label>
                            <input id="crud-form-1" name="name" type="text" class="form-control w-full">
                        </div>
                        <div class="mb-2">
                            <label for="partCategory" class="form-label">Segment</label>
                            <select class="tom-select w-full" required name="segment_id">
                                @foreach ($segments as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="partBrand" class="form-label">Brand</label>
                            <select class="tom-select w-full" required name="brand_id">
                                @foreach ($brands as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>


                        </div>

                        <div class="mb-2">
                            <label for="partUom" class="form-label">Uom</label>
                            <select class="tom-select w-full" required name="uom">
                                <option value="meter">Meter</option>
                                <option value="set">Set</option>
                                <option value="each">Each</option>
                                <option value="roll">Roll</option>
                                <option value="unit">Unit</option>
                                <option value="batang">Batang</option>
                                <option value="liter">Liter</option>
                                <option value="kaleng">Kaleng</option>
                                <option value="kg">Kg</option>
                                <option value="kubic">Kubic</option>
                                <option value="pack">Pack</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label">SN Status</label>
                            <select class="tom-select w-full" required name="sn_status">
                                <option value="non sn">NON SN</option>
                                <option value="sn">SN</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label">Color</label>
                            <div>
                                <select class="tom-select w-full" name="color" required>
                                    <option value="Black">Black</option>
                                    <option value="White">White</option>
                                    <option value="Grey">Grey</option>
                                    <option value="Green">Green</option>
                                    <option value="Yellow">Yellow</option>
                                    <option value="NN">NN</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Silver">Silver</option>
                                    <option value="Multi Color">Multi Color</option>
                                    <option value="Red">Red</option>
                                    <option value="Orange">Orange</option>
                                </select>
                            </div>

                            <div class="mb-2">
                                <label for="partSize" class="form-label">Size</label>
                                <input type="number" class="form-control" name="size" required>
                            </div>

                            <div class="mb-2">
                                <label for="partDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="partDescription" rows="3" name="description"
                                    required></textarea>
                            </div>

                            {{-- <div class="mb-2">
                                <label for="partNote" class="form-label">Note</label>
                                <textarea class="form-control" id="partNote" rows="2" name="note"></textarea>
                            </div> --}}

                            <div class="mb-4">
                                {{-- <label for="partImage" class="form-label">Part Image</label>
                                <input class="form-control" type="file" id="partImage" name="img" accept="image/*"
                                    form="addPartForm"> --}}

                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    for="file_input">Part Image</label>
                                <input
                                    class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer text-gray-400 focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400"
                                    aria-describedby="file_input_help" id="file_input" name="img" accept="image/*"
                                    type="file">
                                <p class="mt-1 text-sm text-gray-500 text-gray-300" id="file_input_help">SVG, PNG,
                                    JPG or GIF (MAX. 800x400px).</p>


                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" data-tw-dismiss="modal"
                        class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                    <button type="submit" class="btn btn-primary w-20">Send</button>
                </div>
            </form>


        </div>
    </div>


    @endsection