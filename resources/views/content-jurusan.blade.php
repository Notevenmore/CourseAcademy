<div class="nav-jurusan">
    @foreach($jurusans as $jurusan)
      <a href="{{ route('course', ['jurusan' => $jurusan->id]) }}" class="link-jurusan">{{ $jurusan->name }}</a>
    @endforeach
</div>