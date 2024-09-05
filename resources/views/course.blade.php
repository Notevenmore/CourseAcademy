@extends('layouts.navbar')

@section('content')
  <section class="home">
    <div class="learning-path-heading">
        <div class="content-course-heading">
          <h2>{{ $course->name }}</h2>
          <p>{{ $course->description }}</p>
        </div>
    </div>
    <div class="course-materials">
        @foreach($course->material->chunk(3) as $chunk)
          <div class="materials">
            @foreach($chunk as $material)
            <a href="{{ route('learn', ['course' => $course, 'materi' => $material]) }}" style="text-decoration: none; color: black;">
              <div class="material">
                  <p>{{ $material->name }}</p>
              </div>
            </a>
            @endforeach
          </div>
        @endforeach
    </div>
  </section>
@endsection