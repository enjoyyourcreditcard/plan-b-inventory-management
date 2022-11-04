@extends('layouts.faq')

@section('content')
    <div class="intro-y col-span-12 lg:col-span-8 xl:col-span-9">
        <div class="intro-y box lg:mt-5">
            <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">Transaction</h2>
            </div>
            <div id="faq-accordion-1" class="accordion accordion-boxed p-5">
                <div class="accordion-item">
                    <div id="faq-accordion-content-1" class="accordion-header">
                        <button class="accordion-button text-2xl" type="button" data-tw-toggle="collapse"
                            data-tw-target="#faq-accordion-collapse-1" aria-expanded="true"
                            aria-controls="faq-accordion-collapse-1">
                            REQUESTER
                        </button>
                    </div>
                    <div id="faq-accordion-collapse-1" class="accordion-collapse collapse"
                        aria-labelledby="faq-accordion-content-1" data-tw-parent="#faq-accordion-1">
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">1. Pertama anda bisa login dengan akun yang sudah di berikan.</p>
                            <img src="{{ asset("dist/images/loginP.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">2. Lalu yang ke dua jika anda sudah melakukan login, maka anda akan masuk ke halaman home.</p>
                            <img src="{{ asset("dist/images/homeReq.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">3. Setelah masuk ke dalam halaman home, jika anda ingin membuat request anda bisa klik new request seperti tanda merah di bawah ini.</p>
                            <img src="{{ asset("dist/images/index.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">4. Jika anda mengklik new request maka akan muncul pop up untuk memastikan anda akan melanjutkan request atau cencel.</p>
                            <img src="{{ asset("dist/images/pop.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">5. Setelah itu anda akan masuk ke dalam halaman request, di dalam halaman request anda bisa mengisi data sesuai dengan request anda.</p>
                            <img src="{{ asset("dist/images/detail.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">6. Jika data sudah di isi semua, untuk menyimpan item ke list anda bisa tekan tombol "add to list".</p>
                            <img src="{{ asset("dist/images/addlist.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">7. Setelah itu anda bisa tekan tombol "submit request" untuk mengajukan request.</p>
                            <img src="{{ asset("dist/images/submitreq.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">8. Pilih "sure" jika anda ingin melanjutkan request.</p>
                            <img src="{{ asset("dist/images/surereq.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">9. Sesudah anda menekan tombol "sure" maka anda akan melihat data yang sudah anda pilih, lalu anda juga bisa melihat timeline untuk request anda.</p>
                            <img src="{{ asset("dist/images/timelinereq.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">10. Jika sudah semua anda bisa kembali lagi ke halaman home, untuk melihat status, jumlah barang, grf code, dan opsi lainya yang tersedia.</p>
                            <img src="{{ asset("dist/images/lastreq.png") }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div id="faq-accordion-content-2" class="accordion-header">
                        <button class="accordion-button text-2xl" type="button" data-tw-toggle="collapse"
                            data-tw-target="#faq-accordion-collapse-2" aria-expanded="true"
                            aria-controls="faq-accordion-collapse-2">
                            INVENTORI CONTROL
                        </button>
                    </div>
                    <div id="faq-accordion-collapse-2" class="accordion-collapse collapse"
                        aria-labelledby="faq-accordion-content-2" data-tw-parent="#faq-accordion-1">
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">1. Pertama anda bisa login terlebih dahulu.</p>
                            <img src="{{ asset("dist/images/loginP.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">2. Jika anda sudah masuk Ke dalam halaman home, anda bisa tekan menu outbound di bagian sidebar, lalu anda bisa tekan gfr untuk masuk ke halaman selanjutnya.</p>
                            <img src="{{ asset("dist/images/Group 1.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">3. Jika anda sudah masuk ke dalam halaman outbound maka anda akan melihat request yang telah di request oleh requester.</p>
                            <img src="{{ asset("dist/images/Group 2.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">4. Ketika anda sudah masuk ke dalam halaman outbound anda dapat memilih part dan menentukan quantity.</p>
                            <img src="{{ asset("dist/images/Group 3.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">5. Setelah itu jika sudah selesai memilih part dan menentukan quantity anda bisa menekan tombol save.</p>
                            <img src="{{ asset("dist/images/Group 4.png") }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div id="faq-accordion-content-3" class="accordion-header">
                        <button class="accordion-button collapsed text-2xl" type="button" data-tw-toggle="collapse"
                            data-tw-target="#faq-accordion-collapse-3" aria-expanded="false"
                            aria-controls="faq-accordion-collapse-3">
                            WAREHOUSE APPROV
                        </button>
                    </div>
                    <div id="faq-accordion-collapse-2" class="accordion-collapse collapse"
                        aria-labelledby="faq-accordion-content-2" data-tw-parent="#faq-accordion-1">
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">1. Klik card yang berisi grf untuk masuk ke dalam halaman approv.</p>
                            <img src="{{ asset("dist/images/approve_1.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">2. Ketika sudah berada di halaman approv, anda bisa klik open untuk memilih metode approv.</p>
                            <img src="{{ asset("dist/images/approve_2.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">3. Pilih metode approv yang anda inginkan.</p>
                            <img src="{{ asset("dist/images/approve_3.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">4. Ketika sudah di approv wh qty, akan mengikuti jumlah yang anda upload di bagian approv.</p>
                            <img src="{{ asset("dist/images/approve_4.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">5. Ketika semua sudah di approv anda bisa langsung klik button submit.</p>
                            <img src="{{ asset("dist/images/approve_5.png") }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div id="faq-accordion-content-4" class="accordion-header">
                        <button class="accordion-button collapsed text-2xl" type="button" data-tw-toggle="collapse"
                            data-tw-target="#faq-accordion-collapse-4" aria-expanded="false"
                            aria-controls="faq-accordion-collapse-4">
                            REQUESTER INDEX & RETURN
                        </button>
                    </div>
                    <div id="faq-accordion-collapse-3" class="accordion-collapse collapse"
                        aria-labelledby="faq-accordion-content-3" data-tw-parent="#faq-accordion-1">
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">1. Terdapat tiga opsi pada kolom request anda, “view detail” untuk melihat detail barang yang anda ajukan, opsi “view surat jalan” untuk melihat surat jalan dari request anda, opsi “pickup item” untuk mengubah status dari request anda.</p>
                            <img src="{{ asset("dist/images/index_1.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">2. Setelah barang siap untuk dipickup, anda dapat menekan opsi “pickup item” dan status request anda akan berubah.</p>
                            <img src="{{ asset("dist/images/index_2.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">3. Setelah menekan opsi “pickup item”, barang-barang tersebut akan dianggap sampai pada requester.</p>
                            <img src="{{ asset("dist/images/index_3.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">4. Untuk melakukan proses pengembalian, anda dapat menekan opsi “return items”.</p>
                            <img src="{{ asset("dist/images/index_4.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">5. Sesuaikan kondisi barang setelah penggunaan dengan pilihan “condition” dan tinggalkan note penggunaan pada table berikut. Setelah menyesuaikan kondisi barang, anda dapat menekan tombol “return” untuk melanjutkan proses pengembalian.</p>
                            <img src="{{ asset("dist/images/return_1.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">5. Bila anda sudah yakin untuk mengembalikan barang, tekan tombol “sure”.</p>
                            <img src="{{ asset("dist/images/return_2.png") }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div id="faq-accordion-content-5" class="accordion-header">
                        <button class="accordion-button collapsed text-2xl" type="button" data-tw-toggle="collapse"
                            data-tw-target="#faq-accordion-collapse-4" aria-expanded="false"
                            aria-controls="faq-accordion-collapse-4">
                            WAREHOUSE RETURN
                        </button>
                    </div>
                    <div id="faq-accordion-collapse-5" class="accordion-collapse collapse"
                        aria-labelledby="faq-accordion-collapse-5" data-tw-parent="#faq-accordion-5">
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">1. Semua request berstatus return akan ditampilkan di sini, anda dapat melakukan approval pengembalian pada request ini dengan menekan request tersebut.</p>
                            <img src="{{ asset("dist/images/warehouse-return-1.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">2. “Request QTY” menampilkan jumlah barang yang direquest oleh requester, sedangkan “Return QTY” menampilkan jumlah serial number yang sudah diinput oleh user.</p>
                            <img src="{{ asset("dist/images/warehouse-return-2.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">3. Untuk menginput serial number untuk pengembalian, anda dapat menekan tombol “Open”.</p>
                            <img src="{{ asset("dist/images/warehouse-return-3.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">4. Tekan “Pieces” untuk menginput serial number secara satuan. Tekan “Bulk” untuk menginput serial number dengan mengimport excel</p>
                            <img src="{{ asset("dist/images/warehouse-return-4.png") }}" alt="">
                        </div>
                        <div class="accordion-body my-5">
                            <p class="text-slate-600 dark:text-slate-500">5. Bila proses penginputan serial number telah selesai, anda dapat menekan tombol “Submit”</p>
                            <img src="{{ asset("dist/images/warehouse-return-5.png") }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
