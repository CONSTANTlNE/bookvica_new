@extends('admin.adminLayout')

@section('customers')

    <table id="customerTable" class="display nowrap mt-7" style="width:100%">
        <thead>
        <tr>
            <th>Purchase Date</th>
            <th>Purchase GEL</th>
            <th>Sales Date</th>
            <th>Sales GEL</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sumOfPurchases2 as $index => $december)
{{--            @php dd($december) @endphp--}}
        <tr>
            <td>{{$december->purchaseinvoices->date}}</td>
            <td>{{$december->purchase_gel}}</td>
            <td>{{$december->salesInvoices->date}}</td>
            <td>{{$december->sales_gel}}</td>

        </tr>
        @endforeach
        </tbody>
    </table>



@endsection