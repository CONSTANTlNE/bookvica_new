@extends('admin.adminLayout')

@section('main')
    {{--@php dd($books[0]) @endphp--}}
    <div class="flex justify-center gap-4">
{{--        Purchase Invoice--}}
        <button type="button" class="hs-dropdown-toggle ti-btn ti-btn-primary-full"
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
                        <form action="{{route('purchase.store')}}" method="post">
                            @csrf
                            <div class="grid grid-cols-12  gap-x-4 gap-y-2 items-center mt-2">

                                <div class="sm:col-span-4 col-span-12">
                                    <label class="hidden" for="purchDate">Date</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Date</div>
                                        <input name="date" type="date" class="form-control" id="purchDate"
                                        >
                                    </div>
                                </div>
                                <div class="sm:col-span-4 col-span-12">
                                    <label class="hidden" for="inv_number">inv_number</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Inv No</div>
                                        <input type="text" class="form-control" name="inv_number" id="inv_number"
                                               placeholder="Inv No">
                                    </div>
                                </div>
                                <div class="sm:col-span-4 col-span-12">
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
                                <div class="sm:col-span-6 col-span-12">
                                    <label class="hidden" for="purchase_ex_rate">Ecchange Rate</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Rate</div>
                                        <input name="ex_rate" type="text" class="form-control" id="purchase_ex_rate"
                                               placeholder="EX Rate">
                                    </div>
                                </div>
                                <div class="sm:col-span-6 col-span-12">
                                    <label class="hidden" for="Stock">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Stock</div>
                                        <select name="stock" class="form-control" id="Stock">
                                            <option selected="">USA</option>
                                            <option>GEO</option>
                                        </select>
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
                            <template id="myTemplate">
                                <div class="grid grid-cols-12  gap-x-4 gap-y-2 items-center mt-2 clone">


                                    <button type="button"
                                            class="ti-btn ti-btn-light ti-btn-wave w-full removeButton sm:col-span-2 col-span-12 text-center">
                                        <span style="color:red;" class=" material-symbols-outlined ">remove</span>
                                    </button>

                                    <div class="sm:col-span-6 col-span-12">
                                        <label class="hidden" for="title">title</label>
                                        <input name="title[]" type="text" class="form-control"
                                               placeholder="Title">
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


                            <button type="submit" class="ti-btn ti-btn-primary-full mt-7">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>


{{--        Sales Invoice--}}
        <button type="button" class="hs-dropdown-toggle ti-btn ti-btn-primary-full"
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
                        <form action="{{route('purchase.store')}}" method="post">
                            @csrf
                            <div class="grid grid-cols-12  gap-x-4 gap-y-2 items-center mt-2">

                                <div class="sm:col-span-4 col-span-12">
                                    <label class="hidden" for="salesDate">Date</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Date</div>
                                        <input name="date" type="date" class="form-control" id="salesDate"
                                        >
                                    </div>
                                </div>
                                <div class="sm:col-span-4 col-span-12">
                                    <label class="hidden" for="inv_number2">inv_number</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Inv No</div>
                                        <input type="text" class="form-control" name="inv_number" id="inv_number2"
                                               placeholder="Inv No">
                                    </div>
                                </div>
                                <div class="sm:col-span-4 col-span-12">
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
                                <div class="sm:col-span-6 col-span-12">
                                    <label class="hidden" for="purchase_ex_rate2">Ecchange Rate</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Rate</div>
                                        <input name="ex_rate" type="text" class="form-control" id="purchase_ex_rate2"
                                               placeholder="EX Rate">
                                    </div>
                                </div>
                                <div class="sm:col-span-6 col-span-12">
                                    <label class="hidden" for="Stock2">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-text">Stock</div>
                                        <select name="stock" class="form-control" id="Stock2">
                                            <option selected="">USA</option>
                                            <option>GEO</option>
                                        </select>
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
                                        <select name="title[]" class="ti-form-select form-control rounded-sm !p-0 tomSelect"
                                                id="" autocomplete="off">

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


                            <button type="submit" class="ti-btn ti-btn-primary-full mt-7">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <table id="example" class="display nowrap" style="width:100%">
        <thead>
        <tr>
            <th>Stock <br><input type="text" id="col0" class="form-control" ></th>
            <th>Purchase Date <br> <input type="text" id="col1" class="form-control" ></th>
            <th>Supplier <br> <input type="text" id="col2" class="form-control" ></th>
            <th>Purch. Inv NO <br> <input type="text" id="col3" class="form-control" ></th>
            <th>Book <br> <input type="text" id="col4" class="form-control" ></th>
            <th>Purch. Currency</th>
            <th>Purch. Amount</th>
            <th>Purch. Rate</th>
            <th>Purch. GEL</th>
            <th>Sales Date <br> <input type="text" id="col9" class="form-control"></th>
            <th>Customer <br> <input type="text" id="col10" class="form-control" ></th>
            <th>Sales Inv No <br> <input type="text" id="col11" class="form-control" ></th>
            <th>Sales Currency</th>
            <th>Sales Rate</th>
            <th>Sales Amount</th>
            <th>Sales GEL</th>
            <th>Actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach($books as $index=> $book)
{{--                        @php dd($book) @endphp--}}
            <tr>
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
                <td><div class="hs-dropdown ti-dropdown">
                        <a aria-label="anchor" href="javascript:void(0);" class="flex items-center justify-center w-[1.75rem] h-[1.75rem]  !text-[0.8rem] !py-1 !px-2 rounded-sm bg-light border-light shadow-none !font-medium" aria-expanded="false">
                            <i class="fe fe-more-vertical text-[0.8rem]"></i>
                        </a>
                        <ul class="hs-dropdown-menu ti-dropdown-menu hidden" style="">
                            <li>
                                <a class="ti-dropdown-item !py-2 !px-[0.9375rem] !text-[0.8125rem] !font-medium block" href="javascript:void(0);">Week</a>
                            </li>
                            <li>
                                <a class="ti-dropdown-item !py-2 !px-[0.9375rem] !text-[0.8125rem] !font-medium block" href="javascript:void(0);">Month</a>
                            </li>
                            <li>
                                <a class="ti-dropdown-item !py-2 !px-[0.9375rem] !text-[0.8125rem] !font-medium block" href="javascript:void(0);">Year</a>
                            </li>
                        </ul>
                    </div></td>
            </tr>

        @endforeach
        </tbody>
        <tfoot>
        <tr>
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
            <th>Actions</th>

        </tr>
        </tfoot>
    </table>

@endsection