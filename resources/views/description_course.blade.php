@extends('layouts.navbar')

@section('content')

<section class="course-desc">
  <div class="course-heading">
    <div class="course-heading-aside-left">
      <div class="title-desc">
        <h1>{{ $course->name }}</h1>
      </div>
      <h3>Rp {{ $course->price }}</h3>
    </div>
    <div class="course-heading-aside-right">
      <img src="{{ asset('img/image 1.png') }}" alt="">
      <form action="{{ route('langganan.store') }}" method="post">
        @csrf
        
        <input type="hidden" name='price' value="{{ $course->price }}">
        <button type='submit' name="langganan" value="{{ $course->id }}" >Beli Sekarang</button>
      </form>
    </div>
  </div>
  <div class="course-content-body">
    <div class="facility">
      <h3>Kursus ini meliputi: </h3>
      <p>{!! $course->facility !!}</p>
    </div>
    <div class="description-course">
      <h3>Requirements</h3>
      <p>{{ $course->requirement }}</p>
    </div>
    <div class="description-course">
      <h3>Deskripsi:</h3>
      <p>{{ $course->description }}</p>
    </div>
  </div>

  <hr class="line-content-student-footer">
  @include('layouts.footer')
</section>

@endsection