@extends('admin.adminLayout')

@section('users')

    <div class="grid grid-cols-12  ">
        <div class="col-start-1 col-span-12 sm:col-span-4">
            <div class="box">
                <div class="box-header justify-between">
                    <div class="box-title">
                        Create User
                    </div>

                </div>
                <div class="box-body">
                    <form action="{{route('createUser')}}"  method="post">
                        @csrf
                        <div class="grid grid-cols-8 mb-4">
                            <div style="margin-right: 1rem" class="sm:col-span-8 col-span-8 mb-3">
                                <label for="inputEmail3" class="sm:col-span-2 col-span-12 col-form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="inputEmail3">
                            </div>
                            <div style="margin-right: 1rem" class="sm:col-span-8 col-span-8 mb-3">
                                <label for="inputEmail3" class="sm:col-span-2 col-span-12 col-form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="inputEmail3">
                            </div>
                            <div style="margin-right: 1rem" class="sm:col-span-8 col-span-8 mb-3">
                                <label for="inputEmail3" class="sm:col-span-2 col-span-12 col-form-label">Password</label>
                                <input type="text" name="password" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="sm:col-span-4 col-span-6">
                            <label for="role" class="sm:col-span-2 col-span-12 col-form-label">Assign Role</label>
                            <select id="role" name="role" class="ti-form-select rounded-sm !py-2 !px-3">
                                <option selected="">Choose Role</option>
                                <option value="admin">Admin</option>
                                <option value="operator">Operator</option>
                                <option value="viewer">Viewer</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="ti-btn ti-btn-primary-full">Create</button>
                    </form>
                </div>

            </div>
        </div>

    </div>


    <div class="table-responsive">
        <table class="table whitespace-nowrap table-bordered table-bordered-primary border-primary/10 min-w-full">
            <thead>
            <tr class="border-b border-primary/10">
                <th scope="col" class="text-start">Name</th>
                <th scope="col" class="text-start">Email</th>
                <th scope="col" class="text-start">Role</th>
                <th scope="col" class="text-start">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $index => $user)
            <tr class="border-b border-primary/10">
                <th scope="row" class="text-start">
                    {{$user->name}}
                </th>
                <td>
                    {{$user->email}}
                </td>
                <td>
                    {{$user->getRoleNames()[0]}}
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
                                <a href="javascript:void(0);" class="ti-dropdown-item !py-2 !px-[0.9375rem] !text-[0.8125rem] !font-medium block"
                                   data-hs-overlay="#updateSupplier{{$index}}">Update User
                                </a>
                                <a href="javascript:void(0);" class="ti-dropdown-item !py-2 !px-[0.9375rem] !text-[0.8125rem] !font-medium block"
                                   data-hs-overlay="#Password{{$index}}">Update Password
                                </a>
                                <a href="javascript:void(0);" class="ti-dropdown-item !py-2 !px-[0.9375rem] !text-[0.8125rem] !font-medium block"
                                  data-hs-overlay="#Role{{$index}}">Update Role
                                </a>
                            </li>
                        </ul>

                    </div>
                </td>
            </tr>
            <div id="updateSupplier{{$index}}" class="hs-overlay hidden ti-modal">
                <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                    <div class="ti-modal-content">
                        <div class="ti-modal-header">

                        </div>
                        <div class="ti-modal-body px-4">
                            <div class="box-body">
                                <form action="{{route('updateUser')}}"  method="post">
                                    <input type="hidden" name="id" value="{{$user->id}}">

                                    @csrf
                                    <div class="grid grid-cols-8 mb-4">
                                        <div style="margin-right: 1rem" class="sm:col-span-8 col-span-8 mb-3">
                                            <label for="ooo{{$index}}" class="sm:col-span-2 col-span-12 col-form-label">Name</label>
                                            <input type="text" name="name" class="form-control" id="ooo{{$index}}" value="{{$user->name}}">
                                        </div>
                                        <div style="margin-right: 1rem" class="sm:col-span-8 col-span-8 mb-3">
                                            <label for="kkk{{$index}}" class="sm:col-span-2 col-span-12 col-form-label" >Email</label>
                                            <input type="text" name="email" class="form-control" id="kkk{{$index}}" value="{{$user->email}}">
                                        </div>

                                    </div>

                                    <br>
                                    <button type="submit" class="ti-btn ti-btn-primary-full">Create</button>
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
            <div id="Password{{$index}}" class="hs-overlay hidden ti-modal">
                <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                    <div class="ti-modal-content">
                        <div class="ti-modal-header">

                        </div>
                        <div class="ti-modal-body px-4">
                            <div class="box-body">
                                <form action="{{route('updateUser')}}"  method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">

                                    <div class="grid grid-cols-8 mb-4">

                                        <div style="margin-right: 1rem" class="sm:col-span-7 col-span-7 mb-3">
                                            <label for="Password{{$index}}" class="sm:col-span-2 col-span-12 col-form-label">Password</label>
                                            <input type="text" name="password" class="form-control" id="Password{{$index}}">
                                        </div>
                                    </div>

                                    <br>
                                    <button type="submit" class="ti-btn ti-btn-primary-full">Update</button>
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
            <div id="Role{{$index}}" class="hs-overlay hidden ti-modal">
                <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                    <div class="ti-modal-content">
                        <div class="ti-modal-header">

                        </div>
                        <div class="ti-modal-body px-4">
                            <div class="box-body">
                                <form action="{{route('updateUser')}}"  method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <div class="sm:col-span-4 col-span-6">
                                        <label for="role{{$index}}" class="sm:col-span-2 col-span-12 col-form-label">Assign Role</label>
                                        <select id="role" name="role{{$index}}" class="ti-form-select rounded-sm !py-2 !px-3">
                                            <option selected="">Choose Role</option>
                                            <option value="admin">Admin</option>
                                            <option value="operator">Operator</option>
                                            <option value="viewer">Viewer</option>
                                        </select>
                                    </div>
                                    <br>
                                    <button type="submit" class="ti-btn ti-btn-primary-full">Create</button>
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
            @endforeach
            </tbody>
        </table>
    </div>

@endsection