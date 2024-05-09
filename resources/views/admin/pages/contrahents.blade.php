@extends('admin.adminLayout')

@section('contrahents')

    <div class="grid grid-cols-12 gap-x-6">

        @foreach($yearlyData as $year => $months)
            @if($year > 1970)
                <div class="xl:col-span-12 col-span-12">
                    <div class="box">
                        <div class="justify-between text-center">
                            <p style="font-size: 1.3rem" class="box-title m-auto py-3 ">
                                Year {{ $year }}
                            </p>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-hover whitespace-nowrap table-bordered min-w-full">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-start">Month</th>
                                        <th scope="col" class="text-start">Supplier</th>
                                        <th scope="col" class="text-start">Invoices</th>
                                        <th scope="col" class="text-start">Amount</th>
                                        <th scope="col" class="text-start">Totals</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr class="border-t border-inherit border-solid hover:bg-gray-100 dark:hover:bg-light dark:border-defaultborder/10">
                                        <td scope="row" class="!text-start">
                                            Jan
                                        </td>
                                        <td>
                                            @if( isset($months['Jan']))
                                                @foreach($months['Jan'] as $key => $value)
                                                    {{--                                                    @php dd($value) @endphp--}}
                                                    <span style="font-size: 1.5rem"
                                                          class="badge bg-primary/10 text-primary ">
                                                        {{ $key }}
                                                    </span><br>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if( isset($months['Jan']))
                                                @foreach($months['Jan'] as $key => $value)
                                                    @foreach($value as $inv => $value2)
                                                        {{--                                                        @php dd($value2) @endphp--}}

                                                        <span style="font-size: 1.5rem"
                                                              class="badge bg-primary/10 text-primary ">
                                                        {{$key}}
                                                            {{ $inv }}
                                                    </span><br>
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if( isset($months['Jan']))
                                                @foreach($months['Jan'] as $key => $value)
                                                    @foreach($value as $inv => $value2)
                                                        {{--                                                        @php dd($value2) @endphp--}}
                                                        @foreach($value2 as $key => $value3)
                                                            <span style="font-size: 1.5rem"
                                                                  class="badge bg-primary/10 text-primary ">

                                                        {{ $value3 }}
                                                    </span><br>
                                                        @endforeach

                                                    @endforeach
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if( isset($months['Jan']))
                                                @php
                                                    $sum=0;
                                                @endphp
                                                @foreach($months['Jan'] as $key => $invoices)

                                                        @foreach($invoices as $num => $value)
                                                            @php
//                                                            dd($value);
                                                                $sum += $value['purchases']
                                                            @endphp
                                                            <span style="font-size: 1.5rem"
                                                                  class="badge bg-primary/10 text-primary ">
                                                           {{  $sum  }}
                                                    </span><br>

                                                    @endforeach
                                                @endforeach
                                            @endif
                                        </td>

                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="box-footer">

                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

@endsection