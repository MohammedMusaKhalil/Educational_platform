@extends('Admin.layout')

@section('content')

    <div class="container m-5 p-5" >
        <div class="d-flex justify-content-between mb-3">
            <h6>Trainers</h6>
            <a class="btn btn-sm btn-primary" href="{{route('Admin.students.create')}}">Add new</a>
        </div>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Spec</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->spec }}</td>
                        <td>
                            <a href="{{ route('Admin.students.edit', ['id' => $student->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ route('Admin.students.delete', ['id' => $student->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                            <a href="{{ route('Admin.students.showCourses', ['id' => $student->id]) }}" class="btn btn-sm btn-primary">Show Courses</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>

@endsection
