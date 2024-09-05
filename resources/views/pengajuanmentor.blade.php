@extends('layouts.navbar')

@section('content')
<div class="container d-flex gap-5 flex-column align-items-center justify-content-center w-100 mt-3 py-5 text-light">
  <h1>{{ $title }}</h1>
  <form action="{{ route('lainnya.store') }}" class="w-75" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Nama</label>
      <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="nama kamu">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Asal</label>
      <input type="text" name="origin" class="form-control" id="exampleFormControlInput1" placeholder="Asal daerah">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Pendidikan akhir</label>
      <input type="text" name="lasteducation" class="form-control" id="exampleFormControlInput1" placeholder="Pendidikan akhir kamu">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Posisi mentor yang kamu inginkan (atau saran course yang ingin ditambahkan dan kamu sebagai mentornya)</label>
      <input type="text" name="course" class="form-control" id="exampleFormControlInput1" placeholder="course yang kamu ingin jadi mentor">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Pengalaman</label>
      <textarea class="form-control" name="experience" id="exampleFormControlTextarea1" rows="3" placeholder="list pengalaman kamu dan ceritain pekerjaan kamu"></textarea>
    </div>
    <div class="mb-3"> 
      <label for="formFileLg" class="form-label">CV</label>
      <input class="form-control" name="curriculumvitae" form-control-lg" id="formFileLg" type="file">
    </div>
    <button type="submit" class="btn btn-primary fw-bold">SUBMIT</button>
  </form>
</div>
@endsection