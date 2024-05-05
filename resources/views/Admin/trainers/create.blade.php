@extends('Admin.layout')

@section('content')
    <div class="container m-5 p-5" >
    <div class="d-flex justify-content-between mb-3">
        <h6>Trainers / Add new</h6>
        <a class="btn btn-sm btn-primary" href="{{route('Admin.trainers.index')}}">Back</a>
    </div>
    @include('Admin.inc.errors')
    <form method="post" action="{{route('Admin.trainers.store')}}" enctype="multipart/form-data" >
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label>Speciality</label>
            <input type="text" name="spec" class="form-control">
        </div>
        <div class="form-group">
            <input type="file" name="img" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection
