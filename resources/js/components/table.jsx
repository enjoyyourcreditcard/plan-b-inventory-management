function Table(props) {
    return (
        <>
            <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
                {/* <table class="table table-report -mt-2">
                <thead>
                    <tr>
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
                            <td class="w-40 !py-4">
                                <a href="" class="underline decoration-dotted whitespace-nowrap">#INV-117807556</a>
                            </td>
                            <td class="w-40">
                                <a href="" class="font-medium whitespace-nowrap">John Travolta</a>
                                                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Ohio, Ohio</div>
                                                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center whitespace-nowrap text-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Completed
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> View Details
                                    </a>
                                    <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right" class="lucide lucide-arrow-left-right w-4 h-4 mr-1"><polyline points="17 11 21 7 17 3"></polyline><line x1="21" y1="7" x2="9" y2="7"></line><polyline points="7 21 3 17 7 13"></polyline><line x1="15" y1="17" x2="3" y2="17"></line></svg> Change Status
                                    </a>
                                </div>
                            </td>
                        </tr>
                                            <tr class="intro-x">
                            <td class="w-40 !py-4">
                                <a href="" class="underline decoration-dotted whitespace-nowrap">#INV-39807556</a>
                            </td>
                            <td class="w-40">
                                <a href="" class="font-medium whitespace-nowrap">Leonardo DiCaprio</a>
                                                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Ohio, Ohio</div>
                                                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center whitespace-nowrap text-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Completed
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> View Details
                                    </a>
                                    <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right" class="lucide lucide-arrow-left-right w-4 h-4 mr-1"><polyline points="17 11 21 7 17 3"></polyline><line x1="21" y1="7" x2="9" y2="7"></line><polyline points="7 21 3 17 7 13"></polyline><line x1="15" y1="17" x2="3" y2="17"></line></svg> Change Status
                                    </a>
                                </div>
                            </td>
                        </tr>
                                            <tr class="intro-x">
                            <td class="w-40 !py-4">
                                <a href="" class="underline decoration-dotted whitespace-nowrap">#INV-29807556</a>
                            </td>
                            <td class="w-40">
                                <a href="" class="font-medium whitespace-nowrap">Angelina Jolie</a>
                                                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">California, LA</div>
                                                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center whitespace-nowrap text-pending">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Pending Payment
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> View Details
                                    </a>
                                    <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right" class="lucide lucide-arrow-left-right w-4 h-4 mr-1"><polyline points="17 11 21 7 17 3"></polyline><line x1="21" y1="7" x2="9" y2="7"></line><polyline points="7 21 3 17 7 13"></polyline><line x1="15" y1="17" x2="3" y2="17"></line></svg> Change Status
                                    </a>
                                </div>
                            </td>
                        </tr>
                                            <tr class="intro-x">
                            <td class="w-40 !py-4">
                                <a href="" class="underline decoration-dotted whitespace-nowrap">#INV-45807556</a>
                            </td>
                            <td class="w-40">
                                <a href="" class="font-medium whitespace-nowrap">Brad Pitt</a>
                                                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Ohio, Ohio</div>
                                                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center whitespace-nowrap text-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Completed
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> View Details
                                    </a>
                                    <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right" class="lucide lucide-arrow-left-right w-4 h-4 mr-1"><polyline points="17 11 21 7 17 3"></polyline><line x1="21" y1="7" x2="9" y2="7"></line><polyline points="7 21 3 17 7 13"></polyline><line x1="15" y1="17" x2="3" y2="17"></line></svg> Change Status
                                    </a>
                                </div>
                            </td>
                        </tr>
                                            <tr class="intro-x">
                            <td class="w-40 !py-4">
                                <a href="" class="underline decoration-dotted whitespace-nowrap">#INV-131807556</a>
                            </td>
                            <td class="w-40">
                                <a href="" class="font-medium whitespace-nowrap">Al Pacino</a>
                                                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">California, LA</div>
                                                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center whitespace-nowrap text-pending">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Pending Payment
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> View Details
                                    </a>
                                    <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right" class="lucide lucide-arrow-left-right w-4 h-4 mr-1"><polyline points="17 11 21 7 17 3"></polyline><line x1="21" y1="7" x2="9" y2="7"></line><polyline points="7 21 3 17 7 13"></polyline><line x1="15" y1="17" x2="3" y2="17"></line></svg> Change Status
                                    </a>
                                </div>
                            </td>
                        </tr>
                                            <tr class="intro-x">
                            <td class="w-40 !py-4">
                                <a href="" class="underline decoration-dotted whitespace-nowrap">#INV-62807556</a>
                            </td>
                            <td class="w-40">
                                <a href="" class="font-medium whitespace-nowrap">Johnny Depp</a>
                                                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Ohio, Ohio</div>
                                                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center whitespace-nowrap text-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Completed
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> View Details
                                    </a>
                                    <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right" class="lucide lucide-arrow-left-right w-4 h-4 mr-1"><polyline points="17 11 21 7 17 3"></polyline><line x1="21" y1="7" x2="9" y2="7"></line><polyline points="7 21 3 17 7 13"></polyline><line x1="15" y1="17" x2="3" y2="17"></line></svg> Change Status
                                    </a>
                                </div>
                            </td>
                        </tr>
                                            <tr class="intro-x">
                            <td class="w-40 !py-4">
                                <a href="" class="underline decoration-dotted whitespace-nowrap">#INV-46807556</a>
                            </td>
                            <td class="w-40">
                                <a href="" class="font-medium whitespace-nowrap">Kate Winslet</a>
                                                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Ohio, Ohio</div>
                                                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center whitespace-nowrap text-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Completed
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> View Details
                                    </a>
                                    <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right" class="lucide lucide-arrow-left-right w-4 h-4 mr-1"><polyline points="17 11 21 7 17 3"></polyline><line x1="21" y1="7" x2="9" y2="7"></line><polyline points="7 21 3 17 7 13"></polyline><line x1="15" y1="17" x2="3" y2="17"></line></svg> Change Status
                                    </a>
                                </div>
                            </td>
                        </tr>
                                            <tr class="intro-x">
                            <td class="w-40 !py-4">
                                <a href="" class="underline decoration-dotted whitespace-nowrap">#INV-73807556</a>
                            </td>
                            <td class="w-40">
                                <a href="" class="font-medium whitespace-nowrap">Johnny Depp</a>
                                                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Ohio, Ohio</div>
                                                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center whitespace-nowrap text-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Completed
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> View Details
                                    </a>
                                    <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right" class="lucide lucide-arrow-left-right w-4 h-4 mr-1"><polyline points="17 11 21 7 17 3"></polyline><line x1="21" y1="7" x2="9" y2="7"></line><polyline points="7 21 3 17 7 13"></polyline><line x1="15" y1="17" x2="3" y2="17"></line></svg> Change Status
                                    </a>
                                </div>
                            </td>
                        </tr>
                                            <tr class="intro-x">
                            <td class="w-40 !py-4">
                                <a href="" class="underline decoration-dotted whitespace-nowrap">#INV-48807556</a>
                            </td>
                            <td class="w-40">
                                <a href="" class="font-medium whitespace-nowrap">Robert De Niro</a>
                                                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Ohio, Ohio</div>
                                                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center whitespace-nowrap text-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Completed
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> View Details
                                    </a>
                                    <a class="flex items-center text-primary whitespace-nowrap" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="arrow-left-right" data-lucide="arrow-left-right" class="lucide lucide-arrow-left-right w-4 h-4 mr-1"><polyline points="17 11 21 7 17 3"></polyline><line x1="21" y1="7" x2="9" y2="7"></line><polyline points="7 21 3 17 7 13"></polyline><line x1="15" y1="17" x2="3" y2="17"></line></svg> Change Status
                                    </a>
                                </div>
                            </td>
                        </tr>
                                    </tbody>
            </table> */}
                {/* <thead class="bg-white border-b s">
                              <tr>
                                <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4 text-left">
                                  Select
                                </th>
                                <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4 text-left">
                                  Company
                                </th>
                                <th scope="col" class="text-md font-medium text-gray-900 px-6 py-4 text-left">
                                  Address
                                </th>
                              </tr>
                            </thead> */}
                <table
                    {...props.getTableProps()}
                    // style={{ position: "relative", borderCollapse: "collapse" }}
                    className="table table-report -mt-2 overflow-scroll w-full"
                >
                    <thead className="sticky top-0">
                        {props.headerGroups.map((headerGroup) => (
                            <tr {...headerGroup.getHeaderGroupProps()}>
                                {headerGroup.headers.map((column) => (
                                    <th
                                        class="whitespace-nowrap uppercase"
                                        {...column.getHeaderProps(
                                            column.getSortByToggleProps()
                                        )}
                                    >
                                        {column.render("Header")}
                                    </th>
                                ))}
                            </tr>
                        ))}
                    </thead>
                    <tbody {...props.getTableBodyProps()}>
                        {props.page == "" ? (
                            <>
                                <tr>
                                    <td
                                        colspan="100%"
                                        style={{ textAlign: "center" }}
                                    >
                                        No records found
                                    </td>
                                </tr>
                            </>
                        ) : (
                            props.page.map((row, i) => {
                                props.prepareRow(row);
                                return (
                                    <tr {...row.getRowProps()} class="intro-x">
                                        {row.cells.map((cell) => {
                                            return (
                                                <td
                                                    {...cell.getCellProps()}
                                                    className="align-middle"
                                                    style={{ fontSize: "12px" }}
                                                >
                                                    {cell.render("Cell")}
                                                </td>
                                            );
                                        })}
                                    </tr>
                                );
                            })
                        )}
                    </tbody>
                </table>
            </div>
            {/* <div className="overflow-x">
              
            </div> */}
        </>
    );
}

export default Table;
