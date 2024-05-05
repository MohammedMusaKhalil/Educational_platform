@extends('Admin.layout')

@section('content')
    <div class="container m-5 p-5" >
    <div CLASS="d-flex justify-content-between mb-3">
        <h6>Categories / Edit / {{$courses->name}}</h6>
        <a class="btn btn-sm btn-primary" href="{{route('Admin.courses.index')}}">Back</a>
    </div>
    @include('Admin.inc.errors')
        <form method="post" action="{{route('Admin.courses.update', ['id' => $courses->id])}}" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$courses->id}}">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{$courses->name}}">
            </div>
            <div class="form-group">
                <select class="form-control" name="cat_id">
                    @foreach($cats as $cat)
                        <option value="{{$cat->id}}" @if($courses->cat_id==$cat->id) selected @endif>{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="trainer_id">
                    @foreach($trainers as $tra)
                        <option value="{{$tra->id}}" @if($courses->trainer_id==$tra->id) selected @endif>{{$tra->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Small_desc</label>
                <input type="text" name="small_desc" class="form-control" value="{{$courses->small_desc}}">
            </div>
            <div class="form-group">
                <label>Desc</label>
                <textarea  name="desc" class="form-control" cols="30" rows="10">{{$courses->desc}}</textarea>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" class="form-control" value="{{$courses->price}}">
            </div>
            <img src="{{asset('uploads/courses/'.$courses->img)}}" height="100px" class="m-5" >
            <div class="form-group">
                <input type="file" name="img" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
