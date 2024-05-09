@extends('admin.adminLayout')

@section('editSales')
    <h2 class="m-auto mt-3 mb-3 text-center">Edit Sales</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="ti-modal-body" id="salesModal">
        <form action="{{route('sales.update')}}" method="post">
            @csrf
            <input type="hidden" name="invoice_id" value="{{$salesInvoice->id}}">
            <div class="grid grid-cols-12  gap-x-4 gap-y-2 items-center mt-2">

                <div class="sm:col-span-3 col-span-12">
                    <label class="hidden" for="salesDate">Date</label>
                    <div class="input-group">
                        <div class="input-group-text">Date</div>
                        <input name="date" type="date" class="form-control" id="salesDate" value="{{$salesInvoice->date}}"
                        >
                    </div>
                </div>
                <div class="sm:col-span-3 col-span-12">
                    <label class="hidden" for="inv_number2">inv_number</label>
                    <div class="input-group">
                        <div class="input-group-text">Inv No</div>
                        <input type="text" class="form-control" name="inv_number" id="inv_number2"
                               placeholder="Inv No" value="{{$salesInvoice->invoice_number}}">
                    </div>
                </div>
                <div class="sm:col-span-3 col-span-12">
                    <label class="hidden" for="currency2">currency</label>
                    <div class="input-group">
                        <div class="input-group-text">Currency</div>
                        <select name="currency" class="form-select !py-[0.59rem]" id="currency2">
                            <option selected>{{$salesInvoice->books[0]->sales_currency}}</option>
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
                               placeholder="EX Rate" value="{{$salesInvoice->books[0]->sales_rate}}">
                    </div>
                </div>

                <div class="sm:col-span-12 col-span-12">
                    <label class="hidden" for="customer">Customer</label>
                    <div class="input-group">
                        <div class="input-group-text">Customer</div>
                        <select name="customer" class="ti-form-select form-control rounded-sm !p-0"
                                id="customer" autocomplete="off">
                            <option selected value="{{$salesInvoice->customers->id}}">{{$salesInvoice->customers->name}}</option>
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
                <div class="sm:col-span-4 col-span-12 text-center">
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
                <div class="sm:col-span-2 col-span-12 text-center">
                    <div class="input-group-text m-auto text-center w-full">
                        <p class="m-auto"> Comment</p>
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

                    <div class="sm:col-span-4 col-span-12">
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
                        <input name="price_nb[]" type="text" class="form-control salesPrice"
                               placeholder="0.00">
                    </div>
                    <div class="sm:col-span-2 col-span-12">
                        <label class="hidden" for="GEL">GEL</label>
                        <input name="price_gel_nb[]" type="text" class="form-control salesGel"
                               placeholder="0.00">
                    </div>
                    <div class="sm:col-span-2 col-span-12">
                        <label for="text-area" class="form-label">Comment</label>
                        <textarea name="comment[]" class="form-control col-span-12" id="text-area"
                                  rows="2"></textarea>
                    </div>
                </div>
            </template>
            <div id="myDiv2">
                @foreach($salesInvoice->books as $index => $item)
                    <div class="grid grid-cols-12  gap-x-4 gap-y-2 items-center mt-2 clone">

                        <button type="button"
                                class="ti-btn ti-btn-light ti-btn-wave w-full removeButton sm:col-span-2 col-span-12 text-center">
                            <span style="color:red;" class=" material-symbols-outlined ">remove</span>
                        </button>

                        <div class="sm:col-span-4 col-span-12">
                            <label class="hidden" for="title">title</label>
                            <select id="book{{$index}}" name="book_id[]"
                                    class="ti-form-select form-control rounded-sm !p-0 oldbooks"
                                    autocomplete="off">

                                <option selected value="{{$item->id}}">{{$item->title}}</option>
                                @foreach($remains as $index => $book)
                                    <option value="{{$book->id}}">{{$book->title}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="sm:col-span-2 col-span-12">
                            <label class="hidden" for="Price">Price</label>
                            <input name="price[]" type="text" class="form-control salesPrice"
                                   placeholder="0.00" value="{{$item->sales_amount}}">
                        </div>
                        <div class="sm:col-span-2 col-span-12">
                            <label class="hidden" for="GEL">GEL</label>
                            <input name="price_gel[]" type="text" class="form-control salesGel"
                                   placeholder="0.00" value="{{$item->sales_gel}}">
                        </div>
                        <div class="sm:col-span-2 col-span-12">
                            <label for="text-area" class="form-label">Comment</label>
                            <textarea name="comment[]" class="form-control col-span-12" id="text-area"
                                      rows="2">{{$item->comment}}</textarea>
                        </div>
                    </div>


                @endforeach
            </div>
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
@endsection