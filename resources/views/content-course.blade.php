@include('content-jurusan')
<div class="nav-jurusan">
  @auth

    @foreach($jurusan->course as $course)

      @foreach($course->pembelian as $pembelian)

        @if($pembelian->student_id == Auth::user()->student->id && $course->mentor_id != Auth::user()->mentor->id)

          <a href="{{ route('course-class', ['jurusan' => $course->jurusan_id,'course' => $course->id]) }}" class="link-jurusan">{{ $course->name }}</a>

        @endif

      @endforeach

    @endforeach
  
  @else

    @foreach($jurusan->course as $course)

      <a href="{{ route('course-class', ['jurusan' => $course->jurusan_id,'course' => $course->id]) }}" class="link-jurusan">{{ $course->name }}</a>

    @endforeach


  @endauth

</div>