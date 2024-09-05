@extends('layouts.navbar')

@section('content')
<div class="d-flex align-items-center justify-content-center w-100 h-75">
  <div class="container">
    <table class="table table-dark table-hover text-center">
      <thead>
        <tr>
          <th>Nama Matkul</th>
          <th>List Materi</th>
          <th>Jumlah Pelajar</th>
        </tr>
      </thead>
      <tbody>
        @foreach(Auth::user()->mentor->course as $course)
    
          <tr>
            <td>{{ $course->name }}</td>
            <td><a href="{{ route('mentor.show', ['mentor' => $course->id]) }}" class="btn btn-info">List Materi</a></td>
            <td>{{ count($course->pembelian) }}</td>
          </tr>
    
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
</body>
</html>