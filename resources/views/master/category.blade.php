@extends('layouts.app')
@section('breadcrumb')

<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Master</a></li>
        <li class="breadcrumb-item active" aria-current="page">Category</li>
    </ol>
</nav>
@endsection
@section('content')
<h2 class="intro-y text-lg font-medium mt-10">Master Category</h2>

<div class="grid grid-cols-12 gap-6 mt-5">


    <div id="master-category" class="intro-y col-span-12 overflow-auto lg:overflow-visible"></div>



    {{--
    <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">
                        <input class="form-check-input" type="checkbox">
                    </th>
                    <th class="whitespace-nowrap">INVOICE</th>
                    <th class="whitespace-nowrap">BUYER NAME</th>
                    <th class="text-center whitespace-nowrap">STATUS</th>
                    <th class="whitespace-nowrap">PAYMENT</th>
                    <th class="text-right whitespace-nowrap">
                        <div class="pr-16">TOTAL TRANSACTION</div>
                    </th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <tr class="intro-x">
                    <td class="w-10">
                        <input class="form-check-input" type="checkbox">
                    </td>
                    <td class="w-40 !py-4">
                        <a href="" class="underline decoration-dotted whitespace-nowrap">#INV-117807556</a>
                    </td>
                    <td class="w-40">
                        <a href="" class="font-medium whitespace-nowrap">John Travolta</a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Ohio, Ohio</div>
                    </td>
                    <td class="text-center">
                        <div class="flex items-center justify-center whitespace-nowrap text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                class="lucide lucide-check-square w-4 h-4 mr-2">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                            </svg> Completed
                        </div>
                    </td>
                    <td>
                        <div class="whitespace-nowrap">Direct bank transfer</div>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                    </td>
                    <td class="w-40 text-right">
                        <div class="pr-16">$117,000,00</div>
                    </td>
                    <td class="table-report__action">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center text-primary whitespace-nowrap mr-5" href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                    class="lucide lucide-check-square w-4 h-4 mr-1">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                </svg> View Details
                            </a>
                            <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;"
                                data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right"
                                    class="lucide lucide-arrow-left-right w-4 h-4 mr-1">
                                    <polyline points="17 11 21 7 17 3"></polyline>
                                    <line x1="21" y1="7" x2="9" y2="7"></line>
                                    <polyline points="7 21 3 17 7 13"></polyline>
                                    <line x1="15" y1="17" x2="3" y2="17"></line>
                                </svg> Change Status
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="intro-x">
                    <td class="w-10">
                        <input class="form-check-input" type="checkbox">
                    </td>
                    <td class="w-40 !py-4">
                        <a href="" class="underline decoration-dotted whitespace-nowrap">#INV-39807556</a>
                    </td>
                    <td class="w-40">
                        <a href="" class="font-medium whitespace-nowrap">Leonardo DiCaprio</a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Ohio, Ohio</div>
                    </td>
                    <td class="text-center">
                        <div class="flex items-center justify-center whitespace-nowrap text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                class="lucide lucide-check-square w-4 h-4 mr-2">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                            </svg> Completed
                        </div>
                    </td>
                    <td>
                        <div class="whitespace-nowrap">Direct bank transfer</div>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                    </td>
                    <td class="w-40 text-right">
                        <div class="pr-16">$39,000,00</div>
                    </td>
                    <td class="table-report__action">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center text-primary whitespace-nowrap mr-5" href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                    class="lucide lucide-check-square w-4 h-4 mr-1">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                </svg> View Details
                            </a>
                            <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;"
                                data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right"
                                    class="lucide lucide-arrow-left-right w-4 h-4 mr-1">
                                    <polyline points="17 11 21 7 17 3"></polyline>
                                    <line x1="21" y1="7" x2="9" y2="7"></line>
                                    <polyline points="7 21 3 17 7 13"></polyline>
                                    <line x1="15" y1="17" x2="3" y2="17"></line>
                                </svg> Change Status
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="intro-x">
                    <td class="w-10">
                        <input class="form-check-input" type="checkbox">
                    </td>
                    <td class="w-40 !py-4">
                        <a href="" class="underline decoration-dotted whitespace-nowrap">#INV-29807556</a>
                    </td>
                    <td class="w-40">
                        <a href="" class="font-medium whitespace-nowrap">Angelina Jolie</a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">California, LA</div>
                    </td>
                    <td class="text-center">
                        <div class="flex items-center justify-center whitespace-nowrap text-pending">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                class="lucide lucide-check-square w-4 h-4 mr-2">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                            </svg> Pending Payment
                        </div>
                    </td>
                    <td>
                        <div class="whitespace-nowrap">Checking payments</div>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">30 March, 11:00</div>
                    </td>
                    <td class="w-40 text-right">
                        <div class="pr-16">$29,000,00</div>
                    </td>
                    <td class="table-report__action">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center text-primary whitespace-nowrap mr-5" href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                    class="lucide lucide-check-square w-4 h-4 mr-1">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                </svg> View Details
                            </a>
                            <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;"
                                data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right"
                                    class="lucide lucide-arrow-left-right w-4 h-4 mr-1">
                                    <polyline points="17 11 21 7 17 3"></polyline>
                                    <line x1="21" y1="7" x2="9" y2="7"></line>
                                    <polyline points="7 21 3 17 7 13"></polyline>
                                    <line x1="15" y1="17" x2="3" y2="17"></line>
                                </svg> Change Status
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="intro-x">
                    <td class="w-10">
                        <input class="form-check-input" type="checkbox">
                    </td>
                    <td class="w-40 !py-4">
                        <a href="" class="underline decoration-dotted whitespace-nowrap">#INV-45807556</a>
                    </td>
                    <td class="w-40">
                        <a href="" class="font-medium whitespace-nowrap">Brad Pitt</a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Ohio, Ohio</div>
                    </td>
                    <td class="text-center">
                        <div class="flex items-center justify-center whitespace-nowrap text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                class="lucide lucide-check-square w-4 h-4 mr-2">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                            </svg> Completed
                        </div>
                    </td>
                    <td>
                        <div class="whitespace-nowrap">Direct bank transfer</div>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                    </td>
                    <td class="w-40 text-right">
                        <div class="pr-16">$45,000,00</div>
                    </td>
                    <td class="table-report__action">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center text-primary whitespace-nowrap mr-5" href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                    class="lucide lucide-check-square w-4 h-4 mr-1">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                </svg> View Details
                            </a>
                            <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;"
                                data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right"
                                    class="lucide lucide-arrow-left-right w-4 h-4 mr-1">
                                    <polyline points="17 11 21 7 17 3"></polyline>
                                    <line x1="21" y1="7" x2="9" y2="7"></line>
                                    <polyline points="7 21 3 17 7 13"></polyline>
                                    <line x1="15" y1="17" x2="3" y2="17"></line>
                                </svg> Change Status
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="intro-x">
                    <td class="w-10">
                        <input class="form-check-input" type="checkbox">
                    </td>
                    <td class="w-40 !py-4">
                        <a href="" class="underline decoration-dotted whitespace-nowrap">#INV-131807556</a>
                    </td>
                    <td class="w-40">
                        <a href="" class="font-medium whitespace-nowrap">Al Pacino</a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">California, LA</div>
                    </td>
                    <td class="text-center">
                        <div class="flex items-center justify-center whitespace-nowrap text-pending">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                class="lucide lucide-check-square w-4 h-4 mr-2">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                            </svg> Pending Payment
                        </div>
                    </td>
                    <td>
                        <div class="whitespace-nowrap">Checking payments</div>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">30 March, 11:00</div>
                    </td>
                    <td class="w-40 text-right">
                        <div class="pr-16">$131,000,00</div>
                    </td>
                    <td class="table-report__action">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center text-primary whitespace-nowrap mr-5" href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                    class="lucide lucide-check-square w-4 h-4 mr-1">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                </svg> View Details
                            </a>
                            <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;"
                                data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right"
                                    class="lucide lucide-arrow-left-right w-4 h-4 mr-1">
                                    <polyline points="17 11 21 7 17 3"></polyline>
                                    <line x1="21" y1="7" x2="9" y2="7"></line>
                                    <polyline points="7 21 3 17 7 13"></polyline>
                                    <line x1="15" y1="17" x2="3" y2="17"></line>
                                </svg> Change Status
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="intro-x">
                    <td class="w-10">
                        <input class="form-check-input" type="checkbox">
                    </td>
                    <td class="w-40 !py-4">
                        <a href="" class="underline decoration-dotted whitespace-nowrap">#INV-62807556</a>
                    </td>
                    <td class="w-40">
                        <a href="" class="font-medium whitespace-nowrap">Johnny Depp</a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Ohio, Ohio</div>
                    </td>
                    <td class="text-center">
                        <div class="flex items-center justify-center whitespace-nowrap text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                class="lucide lucide-check-square w-4 h-4 mr-2">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                            </svg> Completed
                        </div>
                    </td>
                    <td>
                        <div class="whitespace-nowrap">Direct bank transfer</div>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                    </td>
                    <td class="w-40 text-right">
                        <div class="pr-16">$62,000,00</div>
                    </td>
                    <td class="table-report__action">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center text-primary whitespace-nowrap mr-5" href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                    class="lucide lucide-check-square w-4 h-4 mr-1">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                </svg> View Details
                            </a>
                            <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;"
                                data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right"
                                    class="lucide lucide-arrow-left-right w-4 h-4 mr-1">
                                    <polyline points="17 11 21 7 17 3"></polyline>
                                    <line x1="21" y1="7" x2="9" y2="7"></line>
                                    <polyline points="7 21 3 17 7 13"></polyline>
                                    <line x1="15" y1="17" x2="3" y2="17"></line>
                                </svg> Change Status
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="intro-x">
                    <td class="w-10">
                        <input class="form-check-input" type="checkbox">
                    </td>
                    <td class="w-40 !py-4">
                        <a href="" class="underline decoration-dotted whitespace-nowrap">#INV-46807556</a>
                    </td>
                    <td class="w-40">
                        <a href="" class="font-medium whitespace-nowrap">Kate Winslet</a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Ohio, Ohio</div>
                    </td>
                    <td class="text-center">
                        <div class="flex items-center justify-center whitespace-nowrap text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                class="lucide lucide-check-square w-4 h-4 mr-2">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                            </svg> Completed
                        </div>
                    </td>
                    <td>
                        <div class="whitespace-nowrap">Direct bank transfer</div>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                    </td>
                    <td class="w-40 text-right">
                        <div class="pr-16">$46,000,00</div>
                    </td>
                    <td class="table-report__action">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center text-primary whitespace-nowrap mr-5" href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                    class="lucide lucide-check-square w-4 h-4 mr-1">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                </svg> View Details
                            </a>
                            <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;"
                                data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right"
                                    class="lucide lucide-arrow-left-right w-4 h-4 mr-1">
                                    <polyline points="17 11 21 7 17 3"></polyline>
                                    <line x1="21" y1="7" x2="9" y2="7"></line>
                                    <polyline points="7 21 3 17 7 13"></polyline>
                                    <line x1="15" y1="17" x2="3" y2="17"></line>
                                </svg> Change Status
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="intro-x">
                    <td class="w-10">
                        <input class="form-check-input" type="checkbox">
                    </td>
                    <td class="w-40 !py-4">
                        <a href="" class="underline decoration-dotted whitespace-nowrap">#INV-73807556</a>
                    </td>
                    <td class="w-40">
                        <a href="" class="font-medium whitespace-nowrap">Johnny Depp</a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Ohio, Ohio</div>
                    </td>
                    <td class="text-center">
                        <div class="flex items-center justify-center whitespace-nowrap text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                class="lucide lucide-check-square w-4 h-4 mr-2">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                            </svg> Completed
                        </div>
                    </td>
                    <td>
                        <div class="whitespace-nowrap">Direct bank transfer</div>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                    </td>
                    <td class="w-40 text-right">
                        <div class="pr-16">$73,000,00</div>
                    </td>
                    <td class="table-report__action">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center text-primary whitespace-nowrap mr-5" href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                    class="lucide lucide-check-square w-4 h-4 mr-1">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                </svg> View Details
                            </a>
                            <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;"
                                data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right"
                                    class="lucide lucide-arrow-left-right w-4 h-4 mr-1">
                                    <polyline points="17 11 21 7 17 3"></polyline>
                                    <line x1="21" y1="7" x2="9" y2="7"></line>
                                    <polyline points="7 21 3 17 7 13"></polyline>
                                    <line x1="15" y1="17" x2="3" y2="17"></line>
                                </svg> Change Status
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="intro-x">
                    <td class="w-10">
                        <input class="form-check-input" type="checkbox">
                    </td>
                    <td class="w-40 !py-4">
                        <a href="" class="underline decoration-dotted whitespace-nowrap">#INV-48807556</a>
                    </td>
                    <td class="w-40">
                        <a href="" class="font-medium whitespace-nowrap">Robert De Niro</a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Ohio, Ohio</div>
                    </td>
                    <td class="text-center">
                        <div class="flex items-center justify-center whitespace-nowrap text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                class="lucide lucide-check-square w-4 h-4 mr-2">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                            </svg> Completed
                        </div>
                    </td>
                    <td>
                        <div class="whitespace-nowrap">Direct bank transfer</div>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">25 March, 12:55</div>
                    </td>
                    <td class="w-40 text-right">
                        <div class="pr-16">$48,000,00</div>
                    </td>
                    <td class="table-report__action">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center text-primary whitespace-nowrap mr-5" href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                    class="lucide lucide-check-square w-4 h-4 mr-1">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                </svg> View Details
                            </a>
                            <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;"
                                data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right"
                                    class="lucide lucide-arrow-left-right w-4 h-4 mr-1">
                                    <polyline points="17 11 21 7 17 3"></polyline>
                                    <line x1="21" y1="7" x2="9" y2="7"></line>
                                    <polyline points="7 21 3 17 7 13"></polyline>
                                    <line x1="15" y1="17" x2="3" y2="17"></line>
                                </svg> Change Status
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div> --}}



    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        <nav class="w-full sm:w-auto sm:mr-auto">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="chevrons-left" class="lucide lucide-chevrons-left w-4 h-4"
                            data-lucide="chevrons-left">
                            <polyline points="11 17 6 12 11 7"></polyline>
                            <polyline points="18 17 13 12 18 7"></polyline>
                        </svg>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="chevron-left" class="lucide lucide-chevron-left w-4 h-4"
                            data-lucide="chevron-left">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">...</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">...</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="chevron-right" class="lucide lucide-chevron-right w-4 h-4"
                            data-lucide="chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            icon-name="chevrons-right" class="lucide lucide-chevrons-right w-4 h-4"
                            data-lucide="chevrons-right">
                            <polyline points="13 17 18 12 13 7"></polyline>
                            <polyline points="6 17 11 12 6 7"></polyline>
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
        <select class="w-20 form-select box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select>
    </div>
    <!-- END: Pagination -->
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

<div class="modal modal-blur fade" id="createCategoryModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/category" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoryDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="categoryDescription" rows="3" name="description"
                            required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="categoryUom" class="form-label">Uom</label>
                        <select class="tom-select" name="uom[]" required multiple="multiple">
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
                    <button type="submit" class="btn float-end mt-5">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection