@extends('admin.adminLayout')

@section('htmx')


    {{--    Calls hello route and returns whole blade html and replaces!! everything inside div element--}}

    <button hx-get="{{route('hello')}}"  hx-target="#body1" type="button" class="ti-btn ti-btn-light ti-btn-wave">Light</button>

    <div id="body1">Target Body1</div>





{{--    Calls hello route and returns whole blade html and replaces!! everything inside div element --}}
    <div hx-get="{{route('hello')}}">Get Some HTML</div>




    <div hx-target="this" hx-swap="outerHTML">
        <div><label>First Name</label>: Joe</div>
        <div><label>Last Name</label>: Blow</div>
        <div><label>Email</label>: joe@blow.com</div>
        <button hx-get="{{route('clicktoedit')}}" class="btn btn-primary">
            Click To Edit
        </button>
    </div>




@endsection
