@extends('Admin.layout')

@section('content')

    <div class="container m-5 p-5" >
        <div class="d-flex justify-content-between mb-3">
            <h6>Categories</h6>
            <a class="btn btn-sm btn-primary" href="{{route('Admin.cats.create')}}">Add new</a>
        </div>
        <table class="table" >
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody >
            @foreach($cats as $cat)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$cat->name}}</td>
                <td>
                    <a class="btn btn-sm btn-info " href="{{route('Admin.cat.edit',$cat->id)}}">Edit</a>
                    <a class="btn btn-sm btn-danger " href="{{route('Admin.cat.delete',$cat->id)}}">Delete</a>

                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </table>
    </div>
@endsection
