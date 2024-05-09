@extends('admin.adminLayout')

@section('stock')
    <div class="flex justify-center gap-4 sm:flex-row sm:flex-col">

{{--        <form id="stockform" action="{{route('stock')}}" method="get">--}}
{{--            <div class="input-group flex flex-row justify-center  gap-4 ">--}}
{{--            <select id="stockselect" style="width:80px" name="stock" class="mt-2 ti-form-select form-control  rounded-sm !py-2 !px-2">--}}
{{--                <option selected="">Select</option>--}}
{{--                <option  value="ALL">All</option>--}}
{{--                <option @if( request()->query('stock') === 'USA' ) selected @endif value="USA">USA</option>--}}
{{--                <option @if( request()->query('stock') === 'GEO' ) selected @endif  value="GEO">GEO</option>--}}
{{--            </select>--}}
{{--            </div>--}}
{{--        </form>--}}

        <form id="stockdateform" style=" margin-right: 50px" action="{{route('stock')}}"  class="mt-2">
            <div class="input-group flex flex-row justify-center  gap-4 ">

            </div>
            <div class="input-group flex flex-row justify-center gap-4 ">
                <select id="stockselect" style="width:80px" name="stock" class=" ti-form-select form-control  rounded-sm !py-2 !px-2">
                    <option @if( request()->query('stock') == 'ALL' ) selected @endif value="ALL">All</option>
                    <option @if( request()->query('stock') == 'USA' ) selected @endif value="USA">USA</option>
                    <option @if( request()->query('stock') == 'GEO' ) selected @endif  value="GEO">GEO</option>
                </select>
                <div class="input-group-text text-[#8c9097] dark:text-white/50"><i class="ri-calendar-line"></i></div>
                <input name="date" type="text" class="form-control flatpickr-input active" id="date"
                       placeholder="Date Range" readonly="readonly" @if( request()->query('date') !=='') value="{{request()->query('date')}}" @endif>
                <button style="margin-bottom: 0!important;margin-left:5px!important;"
                        class="w ti-btn ti-btn-outline-secondary  ti-btn-wave ">
                    Filter
                </button>
                <a href="{{route('stock')}}" style="margin-bottom: 0!important;margin-left:5px!important;"
                   class="w ti-btn ti-btn-outline-secondary  ti-btn-wave ">
                    All
                </a>

            </div>
        </form>

    </div>

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

@endsection