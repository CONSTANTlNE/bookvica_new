
{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}
    <div class="flex justify-center gap-4 sm:flex-row sm:flex-col">

{{--        <form style=" margin-right: 50px" action="{{route('dateRange')}}" method="post" class="mt-2">--}}
{{--            <div class="input-group flex flex-row justify-center gap-4 ">--}}

{{--                @csrf--}}
{{--                <select name="invoice" class=" form-control ti-form-select rounded-sm !py-2 !px-3">--}}
{{--                    <option value="purchase">Only Purchase</option>--}}
{{--                    <option value="sales">Only Sales</option>--}}
{{--                </select>--}}
{{--                <div class="input-group-text text-[#8c9097] dark:text-white/50"><i class="ri-calendar-line"></i></div>--}}
{{--                <input name="range" type="text" class="form-control flatpickr-input active" id="daterange"--}}
{{--                       placeholder="Date Range" readonly="readonly">--}}
{{--                <button style="margin-bottom: 0!important;margin-left:5px!important;"--}}
{{--                        class="w ti-btn ti-btn-outline-secondary  ti-btn-wave ">--}}
{{--                    Filter--}}
{{--                </button>--}}
{{--                <a href="{{route('main')}}" style="margin-bottom: 0!important;margin-left:5px!important;"--}}
{{--                   class="w ti-btn ti-btn-outline-secondary  ti-btn-wave ">--}}
{{--                    All--}}
{{--                </a>--}}

{{--            </div>--}}
{{--        </form>--}}
        <form style=" margin-right: 50px" hx-post="{{route('dateRangehtmx')}}" hx-trigger="submit" hx-target="#htmx" class="mt-2">
            <div class="input-group flex flex-row justify-center gap-4 ">

                @csrf
                <select name="invoice" class=" form-control ti-form-select rounded-sm !py-2 !px-3">
                    <option  value="purchase">Only Purchase</option>
                    <option value="sales">Only Sales</option>
                </select>
                <div class="input-group-text text-[#8c9097] dark:text-white/50"><i class="ri-calendar-line"></i></div>
                <input  name="range" type="text" class="form-control flatpickr-input active" id="daterange"
                       placeholder="Date Range" readonly="readonly">
                <button  style="margin-bottom: 0!important;margin-left:5px!important;"
                        class="w ti-btn ti-btn-outline-secondary  ti-btn-wave ">
                    Filter
                </button>
                <a href="{{route('main')}}" style="margin-bottom: 0!important;margin-left:5px!important;"
                   class="w ti-btn ti-btn-outline-secondary  ti-btn-wave ">
                    All
                </a>

            </div>
        </form>
        {{--        Purchase Invoice--}}
        <button type="button" class="hs-dropdown-toggle ti-btn ti-btn-outline-primary ti-btn-wave mt-2"
                data-hs-overlay="#hs-extralarge-modal">
            Purchase Invoice
        </button>
        <div id="hs-extralarge-modal" class="hs-overlay hidden ti-modal">
            <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out lg:!max-w-4xl lg:w-full m-3 lg:!mx-auto">
                <div class="ti-modal-content">
                    <div class="ti-modal-header">
                        <h6 class="ti-modal-title m-auto">
                            Purchase Invoice
                        </h6>
                        <button type="button" class="hs-dropdown-toggle ti-modal-close-btn"
                                data-hs-overlay="#hs-extralarge-modal">
                            <span class="sr-only">Close</span>
                            <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                        fill="currentColor"/>
                            </svg>
                        </button>
                    </div>
                    <div class="ti-modal-body" id="purchaseModal">
                        <form action="{{route('purchase.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-12  gap-x-4 gap-y-2 items-center mt-2">

                                <div class="sm:col-span-3 col-span-12">
                                    <label class="hidden" for="purchDate">Date</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Date</div>
                                        <input name="date" type="date" class="form-control" id="purchDate"
                                        >
                                    </div>
                                </div>
                                <div class="sm:col-span-3 col-span-12">
                                    <label class="hidden" for="inv_number">inv_number</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Inv No</div>
                                        <input type="text" class="form-control" name="inv_number" id="inv_number"
                                               placeholder="Inv No">
                                    </div>
                                </div>
                                <div class="sm:col-span-3 col-span-12">
                                    <label class="hidden" for="currency">currency</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Currency</div>
                                        <select name="currency" class="form-select !py-[0.59rem]" id="currency">
                                            <option>USD</option>
                                            <option>GBP</option>
                                            <option>EUR</option>
                                            <option>RUB</option>
                                            <option>AUD</option>
                                            <option>ILS</option>
                                            <option>GEL</option>
                                            <option>Other</option>
                                        </select>

                                    </div>

                                </div>
                                <div class=" col-span-3">
                                    <label class="hidden" for="purchase_ex_rate">Ecchange Rate</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Rate</div>
                                        <input name="ex_rate" type="text" class="form-control" id="purchase_ex_rate"
                                               placeholder="EX Rate">
                                    </div>
                                </div>

                                <div class="sm:col-span-12 col-span-12">
                                    <label class="hidden" for="supplier">supplier</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Supplier</div>
                                        <select name="supplier" class="ti-form-select form-control rounded-sm !p-0"
                                                id="supplier" autocomplete="off">

                                            <option value="">Select a person...</option>
                                            @foreach($suppliers as $index => $supplier)
                                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>

                                            @endforeach
                                        </select>

                                    </div>

                                </div>

                            </div>
                            <br><br>
                            <hr>

                            {{--Header--}}
                            <div class="grid grid-cols-12  gap-x-4 gap-y-2 items-center mt-7 mb-5">
                                <div class="sm:col-span-1 col-span-12 text-center">
                                    <div style="padding-left: 5px!important;" class="input-group-text m-auto text-center w-full">
                                        <p class="m-auto">Action</p>
                                    </div>
                                </div>
                                <div class="sm:col-span-3 col-span-12 text-center">
                                    <div class="input-group-text m-auto text-center w-full">
                                        <p class="m-auto">Title</p>
                                    </div>
                                </div>
                                <div class="sm:col-span-2 col-span-12 text-center">
                                    <div class="input-group-text m-auto text-center w-full">
                                        <p class="m-auto">Stock</p>
                                    </div>
                                </div>
                                <div class="sm:col-span-2 col-span-12 text-center">
                                    <div class="input-group-text m-auto text-center w-full">
                                        <p class="m-auto">Price Currency</p>
                                    </div>
                                </div>
                                <div class="sm:col-span-2 col-span-12 text-center">
                                    <div class="input-group-text m-auto text-center w-full">
                                        <p class="m-auto"> Price GEL</p>
                                    </div>
                                </div>
                                <div class="sm:col-span-2 col-span-12 text-center">
                                    <div class="input-group-text m-auto text-center w-full">
                                        <p class="m-auto"> Comment</p>
                                    </div>
                                </div>

                            </div>
                            {{--Add Book--}}
                            <template id="myTemplate">
                                <div class="grid grid-cols-12  gap-x-4 gap-y-2 items-center mt-2 clone">


                                    <button type="button"
                                            class="ti-btn ti-btn-light ti-btn-wave w-full removeButton sm:col-span-1 col-span-12 text-center">
                                        <span style="color:red;font-size: 1.5rem" class="  ">-</span>
                                    </button>

                                    <div class="sm:col-span-3 col-span-12">
                                        <label class="hidden" for="title">title</label>
                                        <input name="title[]" type="text" class="form-control"
                                               placeholder="Title">
                                    </div>
                                    <div class="sm:col-span-2 col-span-12">
                                        <label class="hidden" for="Stock">Username</label>
                                        <div class="input-group">
                                            <select name="stock[]" class="form-control" id="Stock">
                                                <option selected="">USA</option>
                                                <option>GEO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-2 col-span-12">
                                        <label class="hidden" for="Price">Price</label>
                                        <input name="price[]" type="text" class="form-control purchasePrice"
                                               placeholder="0.00">
                                    </div>
                                    <div class="sm:col-span-2 col-span-12">
                                        <label class="hidden" for="GEL">GEL</label>
                                        <input name="price_gel[]" type="text" class="form-control purchaseGel"
                                               placeholder="0.00">
                                    </div>

                                    <div class="sm:col-span-2 col-span-12">
                                        <label for="text-area" class="form-label">Comment</label>
                                        <textarea name="comment[]" class="form-control col-span-12" id="text-area"
                                                  rows="2"></textarea>
                                    </div>
                                </div>
                            </template>
                            <div id="myDiv"></div>
                            {{-- Footer--}}
                            <div class="grid grid-cols-12  gap-x-4 gap-y-2 items-center mt-5">
                                <div class="sm:col-span-2 col-span-12 text-center">
                                    <button id="addition" type="button"
                                            class="ti-btn ti-btn-light ti-btn-wave w-full sm:col-span-2 col-span-12 text-center">
                                        <span style="color:green;" class="material-symbols-outlined">add</span>
                                    </button>
                                </div>
                                <div class="sm:col-span-6 col-span-12">

                                </div>
                                <div class="sm:col-span-2 col-span-12 text-center">
                                    <div class="input-group-text m-auto text-center w-full">
                                        <p class="m-auto" id="totalCurrency"> 0.00</p>
                                    </div>
                                </div>
                                <div class="sm:col-span-2 col-span-12 text-center">
                                    <div class="input-group-text m-auto text-center w-full">
                                        <p class="m-auto" id="totalGEL"> 0.00</p>
                                    </div>
                                </div>
                            </div>




                            <div class="mt-5">
                                <label for="file-input" class="sr-only">Choose file</label>
                                <input type="file" name="invoice" id="file-input" class="block w-full border border-gray-200 focus:shadow-sm dark:focus:shadow-white/10 rounded-sm text-sm focus:z-10 focus:outline-0 focus:border-gray-200 dark:focus:border-white/10 dark:border-white/10 dark:text-white/50
                                       file:border-0
                                      file:bg-light file:me-4
                                      file:py-3 file:px-4
                                      dark:file:bg-black/20 dark:file:text-white/50">
                            </div>

                            <button type="submit" class="ti-btn ti-btn-primary-full mt-7">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{--        Sales Invoice--}}
        <button type="button" class="hs-dropdown-toggle ti-btn ti-btn-outline-primary ti-btn-wave mt-2"
                data-hs-overlay="#hs-extralarge-modal2">
            Sales Invoice
        </button>
        <div id="hs-extralarge-modal2" class="hs-overlay hidden ti-modal">
            <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out lg:!max-w-4xl lg:w-full m-3 lg:!mx-auto">
                <div class="ti-modal-content">
                    <div class="ti-modal-header">
                        <h6 class="ti-modal-title m-auto">
                            Sales Invoice
                        </h6>
                        <button type="button" class="hs-dropdown-toggle ti-modal-close-btn"
                                data-hs-overlay="#hs-extralarge-modal2">
                            <span class="sr-only">Close</span>
                            <svg class="w-3.5 h-3.5" width="8" height="8" viewBox="0 0 8 8" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M0.258206 1.00652C0.351976 0.912791 0.479126 0.860131 0.611706 0.860131C0.744296 0.860131 0.871447 0.912791 0.965207 1.00652L3.61171 3.65302L6.25822 1.00652C6.30432 0.958771 6.35952 0.920671 6.42052 0.894471C6.48152 0.868271 6.54712 0.854471 6.61352 0.853901C6.67992 0.853321 6.74572 0.865971 6.80722 0.891111C6.86862 0.916251 6.92442 0.953381 6.97142 1.00032C7.01832 1.04727 7.05552 1.1031 7.08062 1.16454C7.10572 1.22599 7.11842 1.29183 7.11782 1.35822C7.11722 1.42461 7.10342 1.49022 7.07722 1.55122C7.05102 1.61222 7.01292 1.6674 6.96522 1.71352L4.31871 4.36002L6.96522 7.00648C7.05632 7.10078 7.10672 7.22708 7.10552 7.35818C7.10442 7.48928 7.05182 7.61468 6.95912 7.70738C6.86642 7.80018 6.74102 7.85268 6.60992 7.85388C6.47882 7.85498 6.35252 7.80458 6.25822 7.71348L3.61171 5.06702L0.965207 7.71348C0.870907 7.80458 0.744606 7.85498 0.613506 7.85388C0.482406 7.85268 0.357007 7.80018 0.264297 7.70738C0.171597 7.61468 0.119017 7.48928 0.117877 7.35818C0.116737 7.22708 0.167126 7.10078 0.258206 7.00648L2.90471 4.36002L0.258206 1.71352C0.164476 1.61976 0.111816 1.4926 0.111816 1.36002C0.111816 1.22744 0.164476 1.10028 0.258206 1.00652Z"
                                        fill="currentColor"/>
                            </svg>
                        </button>
                    </div>
                    <div class="ti-modal-body" id="salesModal">
                        <form action="{{route('sales.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-12  gap-x-4 gap-y-2 items-center mt-2">

                                <div class="sm:col-span-3 col-span-12">
                                    <label class="hidden" for="salesDate">Date</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Date</div>
                                        <input name="date" type="date" class="form-control" id="salesDate"
                                        >
                                    </div>
                                </div>
                                <div class="sm:col-span-3 col-span-12">
                                    <label class="hidden" for="inv_number2">inv_number</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Inv No</div>
                                        <input type="text" class="form-control" name="inv_number" id="inv_number2"
                                               placeholder="Inv No">
                                    </div>
                                </div>
                                <div class="sm:col-span-3 col-span-12">
                                    <label class="hidden" for="currency2">currency</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Currency</div>
                                        <select name="currency" class="form-select !py-[0.59rem]" id="currency2">
                                            <option>USD</option>
                                            <option>GBP</option>
                                            <option>EUR</option>
                                            <option>RUB</option>
                                            <option>AUD</option>
                                            <option>ILS</option>
                                            <option>GEL</option>
                                            <option>Other</option>
                                        </select>

                                    </div>

                                </div>
                                <div class="sm:col-span-3 col-span-12">
                                    <label class="hidden" for="purchase_ex_rate2">Ecchange Rate</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Rate</div>
                                        <input name="ex_rate" type="text" class="form-control" id="purchase_ex_rate2"
                                               placeholder="EX Rate">
                                    </div>
                                </div>

                                <div class="sm:col-span-12 col-span-12">
                                    <label class="hidden" for="customer">Customer</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Customer</div>
                                        <select name="customer" class="ti-form-select form-control rounded-sm !p-0"
                                                id="customer" autocomplete="off">

                                            <option value="">Select a person...</option>
                                            @foreach($customers as $index => $customer)
                                                <option value="{{$customer->id}}">{{$customer->name}}</option>

                                            @endforeach
                                        </select>

                                    </div>

                                </div>


                            </div>
                            <br><br>
                            <hr>

                            {{--Header--}}
                            <div class="grid grid-cols-12  gap-x-4 gap-y-2 items-center mt-7 mb-5">
                                <div class="sm:col-span-2 col-span-12 text-center">
                                    <div class="input-group-text m-auto text-center w-full">
                                        <p class="m-auto">Action</p>
                                    </div>
                                </div>
                                <div class="sm:col-span-6 col-span-12 text-center">
                                    <div class="input-group-text m-auto text-center w-full">
                                        <p class="m-auto">Title</p>
                                    </div>
                                </div>
                                <div class="sm:col-span-2 col-span-12 text-center">
                                    <div class="input-group-text m-auto text-center w-full">
                                        <p class="m-auto">Price Currency</p>
                                    </div>
                                </div>
                                <div class="sm:col-span-2 col-span-12 text-center">
                                    <div class="input-group-text m-auto text-center w-full">
                                        <p class="m-auto"> Price GEL</p>
                                    </div>
                                </div>


                            </div>
                            {{--Add Book--}}
                            <template id="myTemplate2">
                                <div class="grid grid-cols-12  gap-x-4 gap-y-2 items-center mt-2 clone">


                                    <button type="button"
                                            class="ti-btn ti-btn-light ti-btn-wave w-full removeButton sm:col-span-2 col-span-12 text-center">
                                        <span style="color:red;" class=" material-symbols-outlined ">remove</span>
                                    </button>

                                    <div class="sm:col-span-6 col-span-12">
                                        <label class="hidden" for="title">title</label>
                                        <select name="title[]"
                                                class="ti-form-select form-control rounded-sm !p-0 tomSelect"
                                                autocomplete="off">

                                            <option value="">Select a book...</option>
                                            @foreach($remains as $index => $book)
                                                <option value="{{$book->id}}">{{$book->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="sm:col-span-2 col-span-12">
                                        <label class="hidden" for="Price">Price</label>
                                        <input name="price[]" type="text" class="form-control salesPrice"
                                               placeholder="0.00">
                                    </div>
                                    <div class="sm:col-span-2 col-span-12">
                                        <label class="hidden" for="GEL">GEL</label>
                                        <input name="price_gel[]" type="text" class="form-control salesGel"
                                               placeholder="0.00">
                                    </div>
                                </div>
                            </template>
                            <div id="myDiv2"></div>
                            {{-- Footer--}}
                            <div class="grid grid-cols-12  gap-x-4 gap-y-2 items-center mt-5">
                                <div class="sm:col-span-2 col-span-12 text-center">
                                    <button id="addition2" type="button"
                                            class="ti-btn ti-btn-light ti-btn-wave w-full sm:col-span-2 col-span-12 text-center">
                                        <span style="color:green;" class="material-symbols-outlined">add</span>
                                    </button>
                                </div>
                                <div class="sm:col-span-6 col-span-12">

                                </div>
                                <div class="sm:col-span-2 col-span-12 text-center">
                                    <div class="input-group-text m-auto text-center w-full">
                                        <p class="m-auto" id="totalCurrency2"> 0.00</p>
                                    </div>
                                </div>
                                <div class="sm:col-span-2 col-span-12 text-center">
                                    <div class="input-group-text m-auto text-center w-full">
                                        <p class="m-auto" id="totalGEL2"> 0.00</p>
                                    </div>
                                </div>
                            </div>


                            <div class="mt-5">
                                <label for="file-input2" class="sr-only">Choose file</label>
                                <input type="file" name="invoice" id="file-input2" class="block w-full border border-gray-200 focus:shadow-sm dark:focus:shadow-white/10 rounded-sm text-sm focus:z-10 focus:outline-0 focus:border-gray-200 dark:focus:border-white/10 dark:border-white/10 dark:text-white/50
                                       file:border-0
                                      file:bg-light file:me-4
                                      file:py-3 file:px-4
                                      dark:file:bg-black/20 dark:file:text-white/50">
                            </div>

                            <button type="submit" class="ti-btn ti-btn-primary-full mt-7">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <button id="htmxbutton" hx-get="{{route('table')}}"  hx-target="#htmx" type="button" class="ti-btn ti-btn-light ti-btn-wave">Light</button>

    </div>
<div id="htmx">
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
        <tr>

            <th>Reviewed</th>
            <th>Stock <br><input type="text" id="col0" class="form-control"></th>
            <th>Purchase Date <br> <input type="text" id="col1" class="form-control"></th>
            <th>Supplier <br> <input type="text" id="col2" class="form-control"></th>
            <th>Purch. Inv NO <br> <input type="text" id="col3" class="form-control"></th>
            <th>Book <br> <input type="text" id="col4" class="form-control"></th>
            <th>Purch. Currency</th>
            <th>Purch. Amount</th>
            <th>Purch. Rate</th>
            <th>Purch. GEL</th>
            <th>Sales Date <br> <input type="text" id="col9" class="form-control"></th>
            <th>Customer <br> <input type="text" id="col10" class="form-control"></th>
            <th>Sales Inv No <br> <input type="text" id="col11" class="form-control"></th>
            <th>Sales Currency</th>
            <th>Sales Rate</th>
            <th>Sales Amount</th>
            <th>Sales GEL</th>
            <th>Margin</th>
            <th>Profit</th>
            <th>Comment</th>
            <th>Actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach($books as $index=> $book)
            <tr>

                <td>
                    @if($book->reviewed===1)
                    {{$book->reviewed}}
                    @else
                        @endif
                </td>

                <td>{{$book->stock}}</td>
                <td>{{$book->purchaseinvoices->date}}</td>
                <td>{{$book->purchaseinvoices->suppliers->name}}</td>
                <td>{{$book->purchaseinvoices->invoice_number}}</td>
                <td style="white-space: normal !important;min-width: 250px">{{$book->title}}</td>
                <td>{{$book->purchase_currency}}</td>
                <td>{{$book->purchase_amount}}</td>
                <td>{{$book->purchase_rate}}</td>
                <td>{{$book->purchase_gel}}</td>
                <td>@if($book->salesInvoices && $book->salesInvoices->invoice_number)
                        {{$book->salesInvoices->date}}
                    @else
                        Remains
                    @endif
                </td>
                <td>
                    @if($book->salesInvoices && $book->salesInvoices->invoice_number)
                        {{$book->salesInvoices->customers->name}}

                    @endif
                </td>
                <td>
                    @if($book->salesInvoices && $book->salesInvoices->invoice_number)
                        {{$book->salesInvoices->invoice_number}}

                    @endif
                </td>
                <td>
                    @if($book->salesInvoices && $book->salesInvoices->invoice_number)
                        {{$book->sales_currency}}

                    @endif
                </td>
                <td>
                    @if($book->salesInvoices && $book->salesInvoices->invoice_number)
                        {{$book->sales_rate}}

                    @endif
                </td>
                <td>
                    @if($book->salesInvoices && $book->salesInvoices->invoice_number)
                        {{$book->sales_amount}}

                    @endif
                </td>

                <td>
                    @if($book->salesInvoices && $book->salesInvoices->invoice_number)
                        {{$book->sales_gel}}
                    @endif
                </td>
                <td>
                    @if($book->sales_gel)
                        {{  number_format(($book->sales_gel - $book->purchase_gel) / $book->purchase_gel * 100, 2) }}%
                    @endif
                </td>
                <td>
                    @if($book->sales_gel)
                        {{  number_format($book->sales_gel - $book->purchase_gel, 2) }}
                    @endif
                </td>
                <td>
                    {{$book->comment}}
                </td>
                <td>
                    <div class="hs-dropdown ti-dropdown">
                        <a aria-label="anchor" href="javascript:void(0);"
                           class="flex items-center justify-center w-[1.75rem] h-[1.75rem]  !text-[0.8rem] !py-1 !px-2 rounded-sm bg-light border-light shadow-none !font-medium"
                           aria-expanded="false">
                            <i class="fe fe-more-vertical text-[0.8rem]"></i>
                        </a>
                        <ul style="position: absolute" class="hs-dropdown-menu ti-dropdown-menu hidden">
                            <li>
                                <a target="_blank"
                                   class="ti-dropdown-item !py-2 !px-[0.9375rem] !text-[0.8125rem] !font-medium block"
                                   href="{{route('purchase.edit', $book->purchaseinvoices->id)}}">Edit Purchase</a>
                            </li>
                            <li>
                                <a target="_blank"
                                   class="ti-dropdown-item !py-2 !px-[0.9375rem] !text-[0.8125rem] !font-medium block"
                                   @if($book->salesInvoices!== null)  href="{{route('sales.edit', $book->salesInvoices->id )}} @endif">
                                    Edit Sales </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"
                                   class="ti-dropdown-item !py-2 !px-[0.9375rem] !text-[0.8125rem] !font-medium block"
                                   data-hs-overlay="#todo-compose{{$index}}">Delete Purchase
                                </a>

                            </li>
                            @if($book->purchaseinvoices->media)
                                <li>
                                    @foreach($book->purchaseinvoices->media as $img)
                                        @if($loop->first)
                                            <a href="{{$img->getUrl()}}"
                                               class="glightbox2 ti-dropdown-item !py-2 !px-[0.9375rem] !text-[0.8125rem] !font-medium block"
                                            >Purhcase Invoice
                                                <img style="display: none" src="{{$img->getUrl()}}" width="100">
                                            </a>
                                        @endif
                                    @endforeach
                                </li>
                            @endif
                            <li>
                                <a href="javascript:void(0);"
                                   class="glightbox ti-dropdown-item !py-2 !px-[0.9375rem] !text-[0.8125rem] !font-medium block"
                                >Sales Invoice
                                </a>

                            </li>
                            @if($book->salesInvoices!== null)
                                <li>
                                    <a href="javascript:void(0);"
                                       class="ti-dropdown-item !py-2 !px-[0.9375rem] !text-[0.8125rem] !font-medium block"
                                       data-hs-overlay="#salesdelete{{$index}}">Delete Sales
                                    </a>

                                </li>
                            @endif
                        </ul>
                        <div id="todo-compose{{$index}}" class="hs-overlay hidden ti-modal">
                            <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                                <div class="ti-modal-content">
                                    <div class="ti-modal-header">
                                        {{--                                        <h6 class="modal-title text-[1rem] font-semibold text-center" >Delete Purchase</h6>--}}
                                        {{--                                        <button type="button" class="hs-dropdown-toggle !text-[1rem] !font-semibold !text-defaulttextcolor" data-hs-overlay="#todo-compose{{$index}}">--}}
                                        {{--                                            <span class="sr-only">Close</span>--}}
                                        {{--                                            <i class="ri-close-line"></i>--}}
                                        {{--                                        </button>--}}
                                    </div>
                                    <div class="ti-modal-body px-4">
                                        Delete Purchase invoice {{$book->purchaseinvoices->invoice_number}} and all
                                        books in it?
                                    </div>
                                    <div class="ti-modal-footer">
                                        <button type="button"
                                                class="hs-dropdown-toggle ti-btn  ti-btn-secondary-full align-middle"
                                                data-hs-overlay="#todo-compose{{$index}}">
                                            Close
                                        </button>
                                        <form action="{{route('purchase.delete')}}">
                                            <input type="hidden" name="id" value="{{$book->purchaseinvoices->id}}">
                                            @csrf
                                            <button class="ti-btn bg-primary text-white !font-medium">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($book->salesInvoices!== null)
                            <div id="salesdelete{{$index}}" class="hs-overlay hidden ti-modal">
                                <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                                    <div class="ti-modal-content">
                                        <div class="ti-modal-header">

                                        </div>
                                        <div class="ti-modal-body px-4">
                                            Delete Sales invoice {{$book->salesInvoices->invoice_number}} and all books
                                            in it?
                                        </div>
                                        <div class="ti-modal-footer">
                                            <button type="button"
                                                    class="hs-dropdown-toggle ti-btn  ti-btn-secondary-full align-middle"
                                                    data-hs-overlay="#salesdelete{{$index}}">
                                                Close
                                            </button>
                                            <form action="{{route('sales.delete')}}">
                                                <input type="hidden" name="id" value="{{$book->salesInvoices->id}}">
                                                @csrf
                                                <button class="ti-btn bg-primary text-white !font-medium">Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </td>
            </tr>

        @endforeach
        </tbody>
        <tfoot>
        <tr>

            <th>Reviewed</th>
            <th>Stock</th>
            <th>Purch. InvDate</th>
            <th>Supplier</th>
            <th>Purch. Inv No</th>
            <th>Book</th>
            <th>Purch. Currency</th>
            <th style="color: green;font-size: 1.2rem">Purch. Amount</th>
            <th>Purch. Rate</th>
            <th style="color: green;font-size: 1.2rem">Purch. GEL</th>
            <th>Sales InvDate</th>
            <th>Customer</th>
            <th>Sales Inv No</th>
            <th>Sales Currency</th>
            <th>Sales Rate</th>
            <th style="color: green;font-size: 1.2rem">Sales Amount</th>
            <th style="color: green;font-size: 1.2rem">Sales GEL</th>
            <th>Margin</th>
            <th>Profit</th>
            <th>Comment</th>
            <th>Actions</th>

        </tr>
        </tfoot>
    </table>

</div>

    <script >

        let table{{$counter}};

        table{{$counter}} = new DataTable('#example', {
            //Generall SETTINGS
            lengthMenu: [10, 100, 150, {label: 'All', value: -1}],

            // lengthMenu: [ {label: 'All', value: -1}],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.0.5/i18n/ka.json',
            },

            scrollX: true,
            scrollY: 700,


            layout: {

                topStart: {
                    buttons: ['pageLength', 'colvis', 'excel'],
                    // pageLength: {
                    //   menu: [ 10, 25, 50, 100,5000 ]
                    // }
                },

                topEnd: {
                    search: '',
                }
            },

            // TOTALS
            footerCallback: function (row, data, start, end, display) {
                let api = this.api();

                let intVal = function (i) {
                    return typeof i === 'string'
                        ? i.replace(/[\$,]/g, '') * 1
                        : typeof i === 'number'
                            ? i
                            : 0;
                };

                // Purchase currency Totals
                total = api
                    .column(7)
                    .data()
                    .reduce((a, b) => intVal(a) + intVal(b), 0);



                pageTotal = api
                    .column(7, {page: 'current'})
                    .data()
                    .reduce((a, b) => intVal(a) + intVal(b), 0);

                const formatPageTotal = new Intl.NumberFormat('en-US', {
                    maximumFractionDigits: 2,
                }).format(pageTotal);

                const formattotal = new Intl.NumberFormat('en-US', {
                    maximumFractionDigits: 2,
                }).format(total);
                // Update footer

                api.column(7).footer().innerHTML =
                    // '$' + pageTotal + ' ( $' + total + ' total)';
                    // formatPageTotal +' '+ '('+ formattotal +' ' + ' total)';
                    formatPageTotal;




                // Purchase GEL Totals

                // Total over this page
                pageTotal2 = api
                    .column(9, {page: 'current'})
                    .data()
                    .reduce((a, b) => intVal(a) + intVal(b), 0);

                const formatPageTotal2 = new Intl.NumberFormat('en-US', {
                    maximumFractionDigits: 2,
                }).format(pageTotal2);


                api.column(9).footer().innerHTML =
                    // '$' + pageTotal + ' ( $' + total + ' total)';
                    // formatPageTotal +' '+ '('+ formattotal +' ' + ' total)';
                    formatPageTotal2;



                // Sales currency Totals

                // Total over this page
                pageTotal3 = api
                    .column(15, {page: 'current'})
                    .data()
                    .reduce((a, b) => intVal(a) + intVal(b), 0);

                const formatPageTotal3 = new Intl.NumberFormat('en-US', {
                    maximumFractionDigits: 2,
                }).format(pageTotal3);


                api.column(15).footer().innerHTML =
                    // '$' + pageTotal + ' ( $' + total + ' total)';
                    // formatPageTotal +' '+ '('+ formattotal +' ' + ' total)';
                    formatPageTotal3;



                // Sales GEL Totals

                pageTotal4 = api
                    .column(16, {page: 'current'})
                    .data()
                    .reduce((a, b) => intVal(a) + intVal(b), 0);

                const formatPageTotal4 = new Intl.NumberFormat('en-US', {
                    maximumFractionDigits: 2,
                }).format(pageTotal4);


                api.column(16).footer().innerHTML =
                    // '$' + pageTotal + ' ( $' + total + ' total)';
                    // formatPageTotal +' '+ '('+ formattotal +' ' + ' total)';
                    formatPageTotal4;


            },


        });




        $('#col0').on('keyup', function () {
            table{{$counter}}
                .columns(1)
                .search(this.value)
                .draw();
        });


        $('#col1').on('keyup', function () {
            console.log( table
                .columns(2).search(this.value))
            table{{$counter}}
                .columns(2)
                .search(this.value)
                .draw();
        });


        $('#col2').on('keyup', function () {
            table{{$counter}}
                .columns(3)
                .search(this.value)
                .draw();
        });

        $('#col3').on('keyup', function () {
            table{{$counter}}
                .columns(4)
                .search(this.value)
                .draw();
        });
        $('#col4').on('keyup', function () {
            table{{$counter}}
                .columns(5)
                .search(this.value)
                .draw();
        });




        // Sales


        $('#col9').on('keyup', function () {
            table{{$counter}}
                .columns(10)
                .search(this.value)
                .draw();
        });
        $('#col10').on('keyup', function () {
            table{{$counter}}
                .columns(11)
                .search(this.value)
                .draw();
        });

        $('#col11').on('keyup', function () {
            table{{$counter}}
                .columns(12)
                .search(this.value)
                .draw();
        });




    </script>


