@extends('admin.adminLayout')


@section('upload')

  <p>hello</p>



<form action ="{{ route('import') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="file" name="file" >
  <button type="submit" class="btn btn-primary">Upload</button>

</form>

@endsection