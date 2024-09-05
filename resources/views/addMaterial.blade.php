@extends('layouts.navbar')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center w-100 h-75">
  <h1 class="text-light mb-5">{{ $title }}</h1>
  <div class="container w-25">
    <form action="{{ route('material.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="course_id" value="{{ $course->id }}" enctype="multipart/form-data">
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Nama Materi</span>
        <input type="text" name="name" class="form-control" placeholder="Masukkan nama course" aria-label="course-name" aria-describedby="basic-addon1">
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Description</span>
        <textarea name="description" class="form-control" placeholder="Masukkan description course" aria-label="course-name" aria-describedby="basic-addon1">
        </textarea>
      </div>
      <div class="mb-3 text-light">
        <label for="formFile" class="form-label">Upload Modul Materi</label>
        <input class="form-control" name="modul" type="file" id="formFile">
      </div>
      <div class="mb-3 text-light">
        <label for="formFile" class="form-label">Upload Video Materi</label>
        <input class="form-control" name="video" type="file" id="formFile">
      </div>
      <br>
      <div class="d-flex align-items-center justify-content-between mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>    
        <a href="{{ route('mentor.show', ['mentor' => $course->id]) }}" class="btn btn-info">Kembali ke halaman sebelumnya</a>                            
      </div>
    </form>
  </div>
</div>
@endsection
</body>
</html>