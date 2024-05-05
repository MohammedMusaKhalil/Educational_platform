@extends('Admin.layout')

@section('content')
    <div class="container">
        <h1>Trainers / Edit / {{$trainer->name}}</h1>
        <form method="POST" action="{{ route('Admin.trainers.update', ['id' => $trainer->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $trainer->name }}" required>
            </div>

            <div class="form-group">
                <label for="spec">Specialization</label>
                <input type="text" name="spec" id="spec" class="form-control" value="{{ $trainer->spec }}" required>
            </div>

            <div class="form-group">
                <label for="phone">phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $trainer->phone }}">
            </div>
              <img src="{{asset('uploads/trianers/'.$trainer->img)}}" height="100px" class="m-5" >
            <div class="form-group">
                <label for="img"><i></i>mage</label>
                <input type="file" name="img" id="img" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection
