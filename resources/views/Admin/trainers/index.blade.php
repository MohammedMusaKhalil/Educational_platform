@extends('Admin.layout')

@section('content')

    <div class="container m-5 p-5" >
        <div class="d-flex justify-content-between mb-3">
            <h6>Trainers</h6>
            <a class="btn btn-sm btn-primary" href="{{route('Admin.trainers.create')}}">Add new</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Img</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Spec</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($trainer as $tra)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>
                <img src="{{asset('uploads/trianers/'.$tra->img)}}" height="50px">
                </td>
                <td>{{$tra->name}}</td>
                <td>
                    @if($tra->phone != null)
                    {{$tra->phone}}
                    @else
                        not exist
                    @endif
                </td>
                <td>{{$tra->spec}}</td>

                <td>
                    <a class="btn btn-sm btn-info " href="{{ route('Admin.trainers.edit', ['id' => $tra->id]) }}">Edit</a>
                    <a class="btn btn-sm btn-danger " href="{{route('Admin.trainers.delete',$tra->id)}}">Delete</a>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
