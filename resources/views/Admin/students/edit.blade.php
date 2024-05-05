@extends('Admin.layout')

@section('content')
    <div class="container m-5 p-5" >
    <div CLASS="d-flex justify-content-between mb-3">
        <h6>Students / Edit / {{$student->name}}</h6>
        <a class="btn btn-sm btn-primary" href="{{route('Admin.students.index')}}">Back</a>
    </div>
    @include('Admin.inc.errors')
        <form method="POST" action="{{ route('Admin.students.update', ['id' => $student->id]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
            </div>

            <div class="form-group">
                <label for="spec">Spec</label>
                <input type="text" name="spec" class="form-control" value="{{ $student->spec }}">
            </div>

            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection
