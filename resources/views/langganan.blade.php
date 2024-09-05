@extends('layouts.navbar')

@section('content')

<section class="home">
  <div class="heading-langganan">
    <div class="content-heading-langganan">
      <h1>Biaya & Benefit Langganan</h1>
      <p>Pilih paket Pelajaran sebagai investasi belajar yang sesuai dengan kebutuhan kamu.</p>
    </div>
  </div>
  <div class="content-list-langganan">

    @foreach($courses as $course)

      @if(Auth::user()->mentor->id != $course->mentor_id)
      
        <a href="{{ route('langganan.show', ['langganan' => $course->id]) }}">
          <div class="course-items">
            <div class="image-h1-p">
              <img src="{{ asset('img/image 1.png') }}" alt="">
              <div class="h1-p">
                <h1>{{ $course->name }}</h1>
                <p>{{ $course->description }}</p>
              </div>
            </div>
            <div class="price">
              <h3>Rp {{ $course->price }}</h3>
            </div>
          </div>
        </a>

      @endif


    @endforeach

  </div>
  <hr class="line-content-student-footer">
  @include('layouts.footer')
</section>

@endsection