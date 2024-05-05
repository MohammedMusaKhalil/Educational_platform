@extends('Admin.layout')

@section('content')

    <div class="container m-5 p-5" >
        <div class="d-flex justify-content-between mb-3">
            <h6>Courses</h6>
            <a class="btn btn-sm btn-primary" href="{{route('Admin.courses.create')}}">Add new</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Img</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $cour)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>
                    <img src="{{asset('uploads/courses/'.$cour->img)}}" height="50px">
                </td>
                <td>{{$cour->name}}</td>
                <td>{{$cour->price}}</td>
                <td>
                    <a class="btn btn-sm btn-info " href="{{route('Admin.courses.edit',$cour->id)}}">Edit</a>
                    <a class="btn btn-sm btn-danger " href="{{route('Admin.courses.delete',$cour->id)}}">Delete</a>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </table>
    </div>
@endsection
