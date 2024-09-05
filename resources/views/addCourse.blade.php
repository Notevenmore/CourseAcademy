@include('layouts.header')
<body id="page-top">
    <div id="app">
        <div id="wrapper" style="transition: all 0.3s ease-in-out;">
            @include('layouts.sidebaradmin')
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    @include('layouts.navbar')
                    <div class="container-fluid">
                        <h1 class="h3 mb-2 text-gray-800">@if(Request::routeIs('course.edit')) Edit @else Add @endif {{ $Title }}</h1>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
                            </div>
                            <div class="card-body">
                               <form action="@if(Request::routeIs('course.edit')) {{ route('course.update', ['course' => $course->id]) }} @else {{ route('course.store') }} @endif" method="post">
                                  @csrf
                                  @if(Request::routeIs('course.edit'))
                                    @method('PUT')
                                  @endif
                                  <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Nama Course</span>
                                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama course" aria-label="course-name" aria-describedby="basic-addon1" value="@if(Request::routeIs('course.edit')) {{ $course->name }} @endif">
                                  </div>                                
                                  <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Description</span>
                                    <input type="text" name="description" class="form-control" placeholder="Masukkan deskripsi course" aria-label="course-description" aria-describedby="basic-addon1" value="@if(Request::routeIs('course.edit')) {{ $course->description }} @endif">
                                  </div>                                
                                  <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Requirement</span>
                                    <input type="text" name="requirement" class="form-control" placeholder="Masukkan requirement course" aria-label="course-requirement" aria-describedby="basic-addon1" value="@if(Request::routeIs('course.edit')) {{ $course->requirement }} @endif">
                                  </div>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Price</span>
                                    <input type="number" name="price" class="form-control" placeholder="Masukkan biaya course" aria-label="course-price" aria-describedby="basic-addon1" value=@if(Request::routeIs('course.edit')) {{ $course->price }} @endif>
                                  </div>
                                  <div class="input-group">
                                    <span class="input-group-text">Facility</span>
                                    <textarea class="form-control" name="facility" aria-label="facility">@if(Request::routeIs('course.edit')) {{ str_replace('</p>',"\r\n",str_replace('<p>', '', $course->facility)) }} @endif</textarea>
                                  </div>
                                  <select class="form-select mt-3" name="jurusan" aria-label="Default select example">
                                    <option selected value="@if(Request::routeIs('course.edit')) {{ $course->jurusan_id }} @endif">@if(Request::routeIs('course.edit')) {{ $course->jurusan->name }} @else Pilih Jurusan @endif</option>
                                    @foreach($jurusans as $jurusan)

                                      @if(Request::routeIs('course.edit'))

                                        @if($course->jurusan_id != $jurusan->id)

                                          <option value="{{ $jurusan->id }}">{{ $jurusan->name }}</option>

                                        @endif
                                      
                                      @else
    
                                        <option value="{{ $jurusan->id }}">{{ $jurusan->name }}</option>

                                      @endif
                                      
                                    @endforeach
                                  </select>
                                  <br>
                                  <select class="form-select mt-3" name="mentor" aria-label="Default select example">
                                    <option selected value="@if(Request::routeIs('course.edit')) {{ $course->mentor_id }} @endif">@if(Request::routeIs('course.edit')) {{ $course->mentor->user->name }} @else Pilih Mentor @endif</option>
                                    @foreach($users as $user)

                                      @if($user->mentor->status)

                                        @if(Request::routeIs('course.edit'))

                                          @if($course->mentor_id != $user->id)

                                            <option value="{{ $user->id }}">{{ $user->name }}</option>

                                          @endif
                                          
                                        @else

                                          <option value="{{ $user->id }}">{{ $user->name }}</option>

                                        @endif

                                      @endif
                                      
                                    @endforeach
                                  </select>
                                  <br>
                                  <button type="submit" class="btn btn-primary mt-3">Submit</button>                                
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
                
    @include('layouts.footeradmin')