@extends('admin.adminLayout')

@section('changes')

    <table id="changes" class="display nowrap mt-7" style="width:100%">
        <thead>
        <tr>
            <th>Date</th>
            <th>Purchase Invoice</th>
            <th>Sales Invoice</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($changes as $index => $change)
            {{--            @php dd($customer) @endphp--}}
            <tr>
                <td @if($change->checked===0) style="color:red" @else style="color:green"  @endif>{{$change->created_at}}</td>
                <td @if($change->checked===0) style="color:red" @else style="color:green"  @endif>{{$change->purchaseInvoice?->invoice_number}}</td>
                <td @if($change->checked===0) style="color:red" @else style="color:green"  @endif>{{$change->salesInvoice?->invoice_number}}</td>
                 <td class="text-center">
                     <form class="changereviewform"  action="{{route('change.review')}}" method="post">
                         <input type="hidden" name="id" value="{{$change->id}}">
                         @csrf
                     <div class="custom-toggle-switch flex justify-center  my-auto text-center">
                         <input id="toggleswitchSuccess{{$index}}" class="review" name="review" type="checkbox" @if($change->checked===1) checked @endif>
                         <label for="toggleswitchSuccess{{$index}}" class="label-success"></label><span class="ms-3"></span>
                     </div>
                     </form>
                 </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection