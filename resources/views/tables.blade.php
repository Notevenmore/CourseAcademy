@include('layouts.header')
<body id="page-top">
    <section id="app">
        <div id="wrapper" style="transition: all 0.3s ease-in-out;">
            @include('layouts.sidebaradmin')
            <div id="content-wrapper" class="d-flex flex-column">
                @include('layouts.navbar')
                <div id="content">
                    <div class="container-fluid">
                        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
                            </div>
                            <div class="card-body">
                                @if(Request::routeIs('course-data'))
                            
                                    <a href="{{ route('course.create') }}" class="btn btn-primary mb-4">Tambah Course</a>
                                
                                @endif
                                @if(session()->has('success'))
                                <div class="alert alert-success d-flex align-items-center" role="alert">
                                    <div>
                                      {{ session('success') }}
                                    </div>
                                </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                @foreach($labels as $label)
                                                    <th>{{ $label }}</th>
                                                @endforeach
                                                @if(Request::routeIs('course-data'))
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                @elseif(Request::routeIs('userdata.index'))
                                                    <th>Manage user status</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($datas as $data)
                                                <tr>
                                                    @if(Request::routeIs('purchase-data'))
                                                        @if(isset($data->course->name))
                                                            <td>{{ $data->id }}</td>
                                                            <td>{{ $data->student->user->name }}</td>
                                                            <td>{{ $data->student->user->email }}</td>
                                                            <td>{{ $data->course->name }}</td>
                                                            <td>{{ $data->course->price }}</td>
                                                            <td>{{ $data->created_at }}</td>
                                                        @endif
                                                    @elseif(Request::routeIs('course-data'))
                                                        <td>{{ $data->name }}</td>
                                                        <td>
                                                            <ul>
                                                            @foreach($data->material as $material)
                                                                <li>{{ $material->name }}</li>
                                                            @endforeach
                                                            </ul>
                                                        </td>
                                                        <td>@if(isset($data->mentor->user->name)){{ $data->mentor->user->name }}@endif</td>
                                                        <td>{{ $data->jurusan->name }}</td>
                                                        <td><a href="{{ route('course.edit', ['course' => $data->id]) }}" class="btn btn-warning">Edit</a></td>
                                                        <td>
                                                            <form action="{{ route('course.destroy', ['course' => $data->id]) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger" onclick="alert('Want to delete this course?')">DELETE</button>
                                                            </form>
                                                        </td>
                                                    @elseif(Request::routeIs('userdata.index'))
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->email }}</td>
                                                        <td width=500>{{ $data->mentor->description }}</td>
                                                        <td><a href="{{ asset('storage/'.$data->mentor->cv) }}" class="btn btn-primary" download>Lihat CV</a></td>
                                                        <form action="{{ route('userdata.update', ['userdatum' => $data->id]) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <td>
                                                                <div class="container d-flex justify-content-around">
                                                                    <input type="checkbox" id="student" name="student" value={{ true }} @if($data->student->status) checked @endif>
                                                                    <input type="checkbox" id="mentor" name="mentor" value={{ true }} @if($data->mentor->status) checked @endif>
                                                                    <input type="checkbox" id="admin" name="admin" value={{ true }} @if($data->admin->status) checked @endif>
                                                                </div>
                                                                <div class="container d-flex justify-content-around">
                                                                    <label for="student">Student</label>
                                                                    <label for="mentor">Mentor</label>
                                                                    <label for="admin">Admin</label>
                                                                </div>
                                                            </td>
                                                            <td><button type="submit" class="btn btn-warning text-dark" onclick="alert('Did you want to change this user status?')">UPDATE</button></td>
                                                        </form>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    @include('layouts.footeradmin')