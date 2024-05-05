@extends('Admin.layout')

@section('content')
    <div class="container m-5 p-5" >
    <div class="d-flex justify-content-between mb-3">
        <h6>Students / Add new</h6>
        <a class="btn btn-sm btn-primary" href="{{route('Admin.students.index')}}">Back</a>
    </div>
    @include('Admin.inc.errors')
        <form method="POST" action="{{ route('Admin.students.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="spec">Spec</label>
                <input type="text" name="spec" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
