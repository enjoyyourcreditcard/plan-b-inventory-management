@extends('layouts.app') @section('content')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6 mt-5">
            <!-- BEGIN: Notification -->
           
            <!-- BEGIN: General Report -->
            <div class="col-span-12 lg:col-span-8 xl:col-span-6 mt-5">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">General Report</h2>
                    <select class="sm:ml-auto mt-3 sm:mt-0 sm:w-auto form-select box">
                        <option value="daily">Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                        <option value="yearly">Yearly</option>
                        <option value="custom-date">Custom Date</option>
                    </select>
                </div>
                <div class="report-box-2 intro-y mt-12 sm:mt-5">
                    <div class="box sm:flex">
                        <div class="px-8 py-12 flex flex-col justify-center flex-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="shopping-bag" data-lucide="shopping-bag" class="lucide lucide-shopping-bag w-10 h-10 text-warning"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 01-8 0"></path></svg>
                            <div class="relative text-3xl font-medium mt-12 pl-4 ml-0.5">
                                <span class="absolute text-2xl font-medium top-0 left-0 -ml-0.5">$</span> 54.143
                            </div>
                            <div class="report-box-2__indicator bg-success tooltip cursor-pointer">
                                47% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="lucide lucide-chevron-up w-4 h-4 ml-0.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
                            </div>
                            <div class="mt-4 text-slate-500">Sales earnings this month after associated author fees, &amp; before taxes.</div>
                            <button class="btn btn-outline-secondary relative justify-start rounded-full mt-12">
                                Download Reports
                                <span class="w-8 h-8 absolute flex justify-center items-center bg-primary text-white rounded-full right-0 top-0 bottom-0 my-auto ml-auto mr-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="arrow-right" data-lucide="arrow-right" class="lucide lucide-arrow-right w-4 h-4"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </span>
                            </button>
                        </div>
                        <div class="px-8 py-12 flex flex-col justify-center flex-1 border-t sm:border-t-0 sm:border-l border-slate-200 dark:border-darkmode-300 border-dashed">
                            <div class="text-slate-500 text-xs">TOTAL TRANSACTION</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">4.501</div>
                                <div class="text-danger flex text-xs font-medium tooltip cursor-pointer ml-2">
                                    2% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-0.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                </div>
                            </div>
                            <div class="text-slate-500 text-xs mt-5">CANCELATION CASE</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">2</div>
                                <div class="text-danger flex text-xs font-medium tooltip cursor-pointer ml-2">
                                    0.1% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-0.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                </div>
                            </div>
                            <div class="text-slate-500 text-xs mt-5">GROSS RENTAL VALUE</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">$72.000</div>
                                <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2">
                                    49% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="lucide lucide-chevron-up w-4 h-4 ml-0.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                </div>
                            </div>
                            <div class="text-slate-500 text-xs mt-5">GROSS RENTAL PROFIT</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">$54.000</div>
                                <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2">
                                    52% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="lucide lucide-chevron-up w-4 h-4 ml-0.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                </div>
                            </div>
                            <div class="text-slate-500 text-xs mt-5">NEW USERS</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">2.500</div>
                                <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2">
                                    52% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="lucide lucide-chevron-up w-4 h-4 ml-0.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: General Report -->
            <!-- BEGIN: Visitors -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-3 mt-5">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Request</h2>
                    <a href="" class="ml-auto text-primary truncate">View on Map</a>
                </div>
                <div class="report-box-2 intro-y mt-5">
                    <div class="box p-5">
                        <div class="flex items-center">
                            Realtime active users
                            <div class="dropdown ml-auto">
                                <a class="dropdown-toggle w-5 h-5 block -mr-2" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="more-vertical" data-lucide="more-vertical" class="lucide lucide-more-vertical w-5 h-5 text-slate-500"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                </a>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="" class="dropdown-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-text" data-lucide="file-text" class="lucide lucide-file-text w-4 h-4 mr-2"><path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><line x1="10" y1="9" x2="8" y2="9"></line></svg> Export
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="dropdown-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="settings" data-lucide="settings" class="lucide lucide-settings w-4 h-4 mr-2"><path d="M12.22 2h-.44a2 2 0 00-2 2v.18a2 2 0 01-1 1.73l-.43.25a2 2 0 01-2 0l-.15-.08a2 2 0 00-2.73.73l-.22.38a2 2 0 00.73 2.73l.15.1a2 2 0 011 1.72v.51a2 2 0 01-1 1.74l-.15.09a2 2 0 00-.73 2.73l.22.38a2 2 0 002.73.73l.15-.08a2 2 0 012 0l.43.25a2 2 0 011 1.73V20a2 2 0 002 2h.44a2 2 0 002-2v-.18a2 2 0 011-1.73l.43-.25a2 2 0 012 0l.15.08a2 2 0 002.73-.73l.22-.39a2 2 0 00-.73-2.73l-.15-.08a2 2 0 01-1-1.74v-.5a2 2 0 011-1.74l.15-.09a2 2 0 00.73-2.73l-.22-.38a2 2 0 00-2.73-.73l-.15.08a2 2 0 01-2 0l-.43-.25a2 2 0 01-1-1.73V4a2 2 0 00-2-2z"></path><circle cx="12" cy="12" r="3"></circle></svg> Settings
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="text-2xl font-medium mt-2">214</div>
                        <div class="border-b border-slate-200 flex pb-2 mt-4">
                            <div class="text-slate-500 text-xs">Page views per second</div>
                            <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-auto">
                                49% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="lucide lucide-chevron-up w-4 h-4 ml-0.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
                            </div>
                        </div>
                        <div class="mt-2 border-b broder-slate-200">
                            <div class="-mb-1.5 -ml-2.5">
                                <div class="h-[79px]">
                                    <canvas id="report-bar-chart" width="467" height="158" style="display: block; box-sizing: border-box; height: 79px; width: 233.5px;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="text-slate-500 text-xs border-b border-slate-200 flex mb-2 pb-2 mt-4">
                            <div>Top Active Pages</div>
                            <div class="ml-auto">Active Users</div>
                        </div>
                        <div class="flex">
                            <div>/letz-lara…review/2653</div>
                            <div class="ml-auto">472</div>
                        </div>
                        <div class="flex mt-1.5">
                            <div>/midone…review/1674</div>
                            <div class="ml-auto">294</div>
                        </div>
                        <div class="flex mt-1.5">
                            <div>/profile…review/46789</div>
                            <div class="ml-auto">83</div>
                        </div>
                        <div class="flex mt-1.5">
                            <div>/profile…review/24357</div>
                            <div class="ml-auto">21</div>
                        </div>
                        <button class="btn btn-outline-secondary border-dashed w-full py-1 px-2 mt-4">Real-Time Report</button>
                    </div>
                </div>
            </div>
            <!-- END: Visitors -->
            <!-- BEGIN: Users By Age -->
           <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-3 mt-5">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Used</h2>
                    <a href="" class="ml-auto text-primary truncate">View on Map</a>
                </div>
                <div class="report-box-2 intro-y mt-5">
                    <div class="box p-5">
                        <div class="flex items-center">
                            Realtime active users
                            <div class="dropdown ml-auto">
                                <a class="dropdown-toggle w-5 h-5 block -mr-2" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="more-vertical" data-lucide="more-vertical" class="lucide lucide-more-vertical w-5 h-5 text-slate-500"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                </a>
                                <div class="dropdown-menu w-40">
                                    <ul class="dropdown-content">
                                        <li>
                                            <a href="" class="dropdown-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="file-text" data-lucide="file-text" class="lucide lucide-file-text w-4 h-4 mr-2"><path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><line x1="10" y1="9" x2="8" y2="9"></line></svg> Export
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="dropdown-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="settings" data-lucide="settings" class="lucide lucide-settings w-4 h-4 mr-2"><path d="M12.22 2h-.44a2 2 0 00-2 2v.18a2 2 0 01-1 1.73l-.43.25a2 2 0 01-2 0l-.15-.08a2 2 0 00-2.73.73l-.22.38a2 2 0 00.73 2.73l.15.1a2 2 0 011 1.72v.51a2 2 0 01-1 1.74l-.15.09a2 2 0 00-.73 2.73l.22.38a2 2 0 002.73.73l.15-.08a2 2 0 012 0l.43.25a2 2 0 011 1.73V20a2 2 0 002 2h.44a2 2 0 002-2v-.18a2 2 0 011-1.73l.43-.25a2 2 0 012 0l.15.08a2 2 0 002.73-.73l.22-.39a2 2 0 00-.73-2.73l-.15-.08a2 2 0 01-1-1.74v-.5a2 2 0 011-1.74l.15-.09a2 2 0 00.73-2.73l-.22-.38a2 2 0 00-2.73-.73l-.15.08a2 2 0 01-2 0l-.43-.25a2 2 0 01-1-1.73V4a2 2 0 00-2-2z"></path><circle cx="12" cy="12" r="3"></circle></svg> Settings
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="text-2xl font-medium mt-2">214</div>
                        <div class="border-b border-slate-200 flex pb-2 mt-4">
                            <div class="text-slate-500 text-xs">Page views per second</div>
                            <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-auto">
                                49% <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-up" data-lucide="chevron-up" class="lucide lucide-chevron-up w-4 h-4 ml-0.5"><polyline points="18 15 12 9 6 15"></polyline></svg>
                            </div>
                        </div>
                        <div class="mt-2 border-b broder-slate-200">
                            <div class="-mb-1.5 -ml-2.5">
                                <div class="h-[79px]">
                                    <canvas id="report-bar-chart" width="467" height="158" style="display: block; box-sizing: border-box; height: 79px; width: 233.5px;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="text-slate-500 text-xs border-b border-slate-200 flex mb-2 pb-2 mt-4">
                            <div>Top Active Pages</div>
                            <div class="ml-auto">Active Users</div>
                        </div>
                        <div class="flex">
                            <div>/letz-lara…review/2653</div>
                            <div class="ml-auto">472</div>
                        </div>
                        <div class="flex mt-1.5">
                            <div>/midone…review/1674</div>
                            <div class="ml-auto">294</div>
                        </div>
                        <div class="flex mt-1.5">
                            <div>/profile…review/46789</div>
                            <div class="ml-auto">83</div>
                        </div>
                        <div class="flex mt-1.5">
                            <div>/profile…review/24357</div>
                            <div class="ml-auto">21</div>
                        </div>
                        <button class="btn btn-outline-secondary border-dashed w-full py-1 px-2 mt-4">Real-Time Report</button>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
   
</div>
@endsection
