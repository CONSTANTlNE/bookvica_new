@extends('admin.adminLayout')

@section('suppliers')
    <div class="grid grid-cols-12  m-auto">
        <div class="col-start-1 col-span-4">
            <div class="box">
                <div class="box-header justify-between">
                    <div class="box-title">
                        Create Supplier
                    </div>

                </div>
                <div class="box-body">
                    <form action="{{route('supplier.store')}}" method="post">
                        @csrf
                        <div class="grid grid-cols-8 mb-4">
                            <label for="inputEmail3" class="sm:col-span-2 col-span-12 col-form-label">Name</label>
                            <div class="sm:col-span-4 col-span-6">
                                <input type="text" name="name" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <button type="submit" class="ti-btn ti-btn-primary-full">Create</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <table id="supplierTable" class="display nowrap mt-7" style="width:100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($suppliers as $index => $supplier)
            {{--            @php dd($customer) @endphp--}}
            <tr>
                <td>{{$supplier->name}}</td>
                <td>
                    <div class="hs-dropdown ti-dropdown">
                        <a aria-label="anchor" href="javascript:void(0);"
                           class="flex items-center justify-center w-[1.75rem] h-[1.75rem]  !text-[0.8rem] !py-1 !px-2 rounded-sm bg-light border-light shadow-none !font-medium"
                           aria-expanded="false">
                            <i class="fe fe-more-vertical text-[0.8rem]"></i>
                        </a>
                        <ul style="position: absolute" class="hs-dropdown-menu ti-dropdown-menu hidden">

                            <li>
                                <a href="javascript:void(0);" class="ti-dropdown-item !py-2 !px-[0.9375rem] !text-[0.8125rem] !font-medium block"
                                   data-hs-overlay="#deleteSupplier{{$index}}">Delete Supplier
                                </a>

                            </li>
                            <li>
                                <a href="javascript:void(0);" class="ti-dropdown-item !py-2 !px-[0.9375rem] !text-[0.8125rem] !font-medium block"
                                   data-hs-overlay="#updateSupplier{{$index}}">Edit Supplier
                                </a>
                            </li>
                        </ul>
                        <div id="deleteSupplier{{$index}}" class="hs-overlay hidden ti-modal">
                            <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                                <div class="ti-modal-content">
                                    <div class="ti-modal-body px-4">
                                        Delete Supplier {{$supplier->name}} ? all Purchase invoices will be deleted !
                                    </div>
                                    <div class="ti-modal-footer">
                                        <button type="button"
                                                class="hs-dropdown-toggle ti-btn  ti-btn-secondary-full align-middle"
                                                data-hs-overlay="#deleteSupplier{{$index}}">
                                            Close
                                        </button>
                                        <form action="{{route('supplier.delete')}}" method="post">
                                            <input type="hidden" name="id" value="{{$supplier->id}}">
                                            @csrf
                                            <button class="ti-btn bg-primary text-white !font-medium">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="updateSupplier{{$index}}" class="hs-overlay hidden ti-modal">
                            <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                                <div class="ti-modal-content">
                                    <div class="ti-modal-header">

                                    </div>
                                    <div class="ti-modal-body px-4">
                                        <div class="box-body">
                                            <form action="{{route('supplier.update')}}" method="post">
                                                @csrf
                                                <div class="grid grid-cols-8 mb-4">
                                                    <input type="hidden" name="id" value="{{$supplier->id}}">
                                                    <label for="inputEmail3" class="sm:col-span-2 col-span-12 col-form-label">Name</label>
                                                    <div class="sm:col-span-4 col-span-6">
                                                        <input type="text" name="name" class="form-control" id="inputEmail3">
                                                    </div>
                                                </div>
                                                <button type="submit" class="ti-btn ti-btn-primary-full">update</button>
                                            </form>
                                        </div>


                                    </div>
                                    <div class="ti-modal-footer">
                                        {{--                                        <button type="button"--}}
                                        {{--                                                class="hs-dropdown-toggle ti-btn  ti-btn-secondary-full align-middle"--}}
                                        {{--                                                data-hs-overlay="#updateCustomer{{$index}}">--}}
                                        {{--                                            Close--}}
                                        {{--                                        </button>--}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection