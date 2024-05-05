<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body style="background-color: #d6d6d9 ">
<header class="main_menu home_menu">
        <div class="row align-items-center" style="background-color: #ffab70 " >
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="{{route('Admin.home')}}">DashBoard Admin</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item active">
                                <a class="nav-link active" aria-current="page" href="{{route('Admin.cat.index')}}">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('Admin.trainers.index')}}">Trainers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('Admin.courses.index')}}">Courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('Admin.students.index')}}">Student</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item active">
                                <a class="nav-link active" aria-current="page" href="{{route('Admin.logout')}}">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
</header>

