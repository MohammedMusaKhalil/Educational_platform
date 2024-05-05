@extends('Admin.layout')

@section('content')
    <div class="container m-5 p-5" >
    <div class="d-flex justify-content-between mb-3">
        <h6>Categories / Add new</h6>
        <a class="btn btn-sm btn-primary" href="{{route('Admin.cat.index')}}">Back</a>
    </div>
    @include('Admin.inc.errors')
    <form method="post" action="{{route('Admin.cat.store')}}">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection
