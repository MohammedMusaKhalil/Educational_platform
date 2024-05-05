@extends('Admin.layout')

@section('content')
    <div class="container m-5 p-5" >
    <div CLASS="d-flex justify-content-between mb-3">
        <h6>Categories / Edit / {{$cat->name}}</h6>
        <a class="btn btn-sm btn-primary" href="{{route('Admin.cat.index')}}">Back</a>
    </div>
    @include('Admin.inc.errors')
    <form method="POST" action="{{route('Admin.cats.update', ['id' => $cat->id]) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$cat->id}}">
        <div class="form-group">
            <label style="margin-bottom: 15px">Name</label>
            <input type="text" name="name" class="form-control" value="{{$cat->name}}" style="margin-bottom: 15px">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection
