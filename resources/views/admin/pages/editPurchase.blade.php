@extends('admin.adminLayout')

@section('editPurchase')
    <h2 class="m-auto mt-3 mb-3 text-center">Edit Purchase</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="ti-modal-body" id="purchaseModal">
        <form action="{{route('purchase.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="invoice_id" value="{{$purchase->id}}">
            <div class="grid grid-cols-12  gap-x-4 gap-y-2 items-center mt-2">

                <div class="sm:col-span-3 col-span-12">
                    <label class="hidden" for="purchDate">Date</label>
                    <div class="input-group">
                        <div class="input-group-text">Date</div>
                        <input name="date" type="date" class="form-control" id="purchDate" value="{{$purchase->date}}">
                    </div>
                </div>
                <div class="sm:col-span-3 col-span-12">
                    <label class="hidden" for="inv_number">inv_number</label>
                    <div class="input-group">
                        <div class="input-group-text">Inv No</div>
                        <input type="text" class="form-control" name="inv_number" id="inv_number" placeholder="Inv No" value="{{$purchase->invoice_number}}">
                    </div>
                </div>
                <div class="sm:col-span-3 col-span-12">
                    <label class="hidden" for="currency">currency</label>
                    <div class="input-group">
                        <div class="input-group-text">Currency</div>
                        <select name="currency" class="form-select !py-[0.59rem]" id="currency">
                            <option selected>{{$purchase->books[0]->purchase_currency}}</option>
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
                    <label class="hidden" for="purchase_ex_rate">Exchange Rate</label>
                    <div class="input-group">
                        <div class="input-group-text">Rate</div>
                        <input name="ex_rate" type="text" class="form-control" id="purchase_ex_rate" placeholder="EX Rate" value="{{$purchase->books[0]->purchase_rate}}">
                    </div>
                </div>

                <div class="sm:col-span-12 col-span-12">
                    <label class="hidden" for="supplier">supplier</label>
                    <div class="input-group">
                        <div class="input-group-text">Supplier</div>
                        <select name="supplier" class="ti-form-select form-control rounded-sm !p-0"
                                id="supplier" autocomplete="off">

                            <option selected value="{{$purchase->suppliers->id}}">{{$purchase->suppliers->name}}</option>
                            @foreach($suppliers as $index => $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach
                        </select>

                    </div>

                </div>


            </div>
            <br><br>
            <hr>


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

            <template id="myTemplate">
                <div class="grid grid-cols-12  gap-x-4 gap-y-2 items-center mt-2 clone">

                    <button type="button"
                            class="ti-btn ti-btn-light ti-btn-wave w-full removeButton sm:col-span-1 col-span-12 text-center">
                        <span style="color:red;" class=" material-symbols-outlined ">remove</span>
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
            <div id="myDiv">
                @foreach($purchase->books as $index => $item)
{{--                    @php                     dd($item) @endphp--}}
                    <div class="grid grid-cols-12  gap-x-4 gap-y-2 items-center mt-2 clone">


                        <button type="button" class="ti-btn ti-btn-light ti-btn-wave w-full removeButton sm:col-span-1 col-span-12 text-center">
                            <span style="color:red;font-size: 1.5rem">-</span>
                        </button>

                        <div class="sm:col-span-3 col-span-12">
                            <label class="hidden" for="title">title</label>
                            <input name="book_id[]" type="hidden" class="form-control" placeholder="Title" value="{{$item->id}}">
                            <input name="title[]" type="text" class="form-control" placeholder="Title" data-id="{{$item->id}}" value="{{$item->title}}">
                        </div>
                        <div class="sm:col-span-2 col-span-12">
                            <label class="hidden" for="Stock">Username</label>
                            <div class="input-group">
                                <select name="stock[]" class="form-control" id="Stock">
                                    <option selected="">{{$item->stock}}</option>
                                    <option>GEO</option>
                                    <option>USA</option>
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-2 col-span-12">
                            <label class="hidden" for="Price">Price</label>
                            <input name="price[]" type="text" class="form-control purchasePrice" placeholder="0.00" value="{{$item->purchase_amount}}">
                        </div>
                        <div class="sm:col-span-2 col-span-12">
                            <label class="hidden" for="GEL">GEL</label>
                            <input name="price_gel[]" type="text" class="form-control purchaseGel" placeholder="0.00" value="{{$item->purchase_gel}}">
                        </div>
                        <div class="sm:col-span-2 col-span-12">
                            <label for="text-area" class="form-label">Comment</label>
                            <textarea name="comment[]" class="form-control col-span-12" id="text-area"
                                      rows="2">{{$item->comment}}</textarea>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="grid grid-cols-12  gap-x-4 gap-y-2 items-center mt-5">
                <div class="sm:col-span-2 col-span-12 text-center">
                    <button id="addition" type="button" class="ti-btn ti-btn-light ti-btn-wave w-full sm:col-span-2 col-span-12 text-center">
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


            <div class="mt-5 col-span-2">
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