@extends('Admin.layout')

@section('content')
    <div class="container m-5 p-5">
        <div class="d-flex justify-content-between mb-3">
            <h6>Students / ShowCourses/{{$students->name}}</h6>
            <div>
            <a class="btn btn-sm btn-info" href="{{route('Admin.students.addCourse',$students->id)}}">Add to course</a>
            <a class="btn btn-sm btn-primary" href="{{route('Admin.students.index')}}">Back</a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NumCourse</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @if(count($courses) > 0)
                        @foreach($courses as $c)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>Course num {{$c->course_id}}</td>
                                <td>{{$c->status}}</td>
                                <td>
                                    @if($c->status != 'approve')
                                        <a class="btn btn-sm btn-info" href="{{ route('Admin.students.approve', [$students->id,$c->course_id]) }}">Approve</a>
                                    @endif
                                    @if($c->status != 'reject' )
                                        <a class="btn btn-sm btn-danger" href="{{ route('Admin.students.reject', [$students->id,$c->course_id]) }}">Reject</a>
                                    @endif
                                        <a class="btn btn-sm btn-warning" href="{{ route('Admin.students.deleteCourse', [$students->id, $c->course_id]) }}">Delete</a>                                </td>
                            </tr>
                        @endforeach
            @else
                <b>There are no courses registered yet.</b>
            @endif
            </tbody>


        </table>
    </div>
@endsection
