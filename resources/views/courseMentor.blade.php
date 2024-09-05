@extends('layouts.navbar')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center w-100 h-75">
  <div class="container d-flex flex-column pt-5 mt-5">
    <h1 class="text-center text-light mb-5">{{ $title }}</h1>
    @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    <a href="{{ route('add-material', ['course' => $course]) }}" class="btn btn-primary mb-3">Add Materi</a>
    <table class="table table-dark table-hover text-center">
      <thead>
        <tr>
          <th>Materi</th>
          <th>Comment</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($course->material as $material)
    
          <tr>
            <td>{{ $material->name }}</td>
            <td><a href="{{ route('learn', ['course' => $material->course, 'materi' => $material]) }}" class="btn btn-primary">Lihat Kelas Anda</a></td>
            <td>
              <form action="{{ route('material.destroy', ['material' => $material]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="alert('Ingin menghapus materi?')">Delete Materi</button>
              </form>
            </td>
          </tr>
    
        @endforeach
      </tbody>
    </table>
    <a href="{{ route('mentor.index') }}" class="btn btn-info">Kembali ke halaman sebelumnya</a>
  </div>
</div>

@endsection
</body>
</html>