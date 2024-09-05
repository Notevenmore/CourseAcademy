@extends('layouts.navbar')

@section('content')
<div class="container sticky-top ms-auto me-0 d-flex align-items-start flex-row-reverse">
  <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><<</button>
</div>
<div class="d-flex flex-column">
  <div class="container d-flex flex-column w-75">
    <h1 class="text-light mt-3 text-start w-100">{{ $material->name }}</h1>
    <div class="text-light mt-3 mb-3">{!! $material->description !!}</div>
  </div>
  <div class="container h-100 d-flex flex-column align-items-center justify-content-center my-5">
    <video width=1250 height=670 class="object-fit-cover" controls>
      <source src="{{ asset('storage/'.$material->video) }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
  </div>
  <div class="container d-flex justify-content-around w-75 px-2">
    <div class="container px-0">
      <a href="{{ asset('storage/'.$material->modul) }}" class="btn btn-primary my-3" download>PDF MODUL</a>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Komentar
      </button>
      <div class="modal fade gap-2" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Comments</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                @foreach($material->review as $review)
                  <div class="container mb-3">
                    <div class="card">
                      <h5 class="card-header">{{ $review->user->name }}</h5>
                      <div class="card-body">
                        <div class="card-text">
                          {!! $review->comment !!}
                        </div>
                        <div class="card-text">
                          @foreach($review->repliesreview as $reply)
                          <div class="container mb-3">
                            <div class="card">
                              <h5 class="card-header">Membalas {{ $review->user->name }} oleh {{ $reply->user->name }}</h5>
                              <div class="card-body">
                                <div class="card-text">
                                  {!! $reply->comment !!}
                                </div>
                              </div>
                            </div>
                          </div>
                          @endforeach
                        </div>
                      </div>
                      <form action="{{ route('review.store') }}" method="post">
                        @csrf
                        <div class="card-footer">
                          <input type="hidden" name="review_id" value="{{ $review->id }}">
                          <input type="hidden" name="material_id" value="{{ $material->id }}">
                          <textarea name="replies" class="form-control" placeholder="Reply" id="floatingTextarea"></textarea>
                          <button type="submit" name="reply" value=1 class="btn btn-primary">Reply</button>
                        </div>
                      </form>
                    </div>
                  </div>
                @endforeach
                <div class="container"> 
                  <form action="{{ route('review.store') }}" method="post">
                    @csrf
                    <div class="form-floating">
                      <input type="hidden" name="material_id" value="{{ $material->id }}">
                      <textarea name="comment" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                      <label for="floatingTextarea">Comments</label>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send Comment</button>
              </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasRightLabel">{{ $course->name }}</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <h5>{{ $material->name }}</h5>
      <hr>
      <ul class="list-group w-100 text-center mb-5 mt-5">
        @foreach($course->material as $materi)
            
          <li class="list-group-item"><a href="{{ route('learn', ['course' => $course, 'materi' => $materi]) }}" class="btn btn-primary">{{ $materi->name }}</a></li>
          
        @endforeach
        <li class="list-group-item"><a href="{{ route('home') }}" class="btn btn-primary">Back to home</a></li>
      </ul>
    </div>
  </div>
</div>
@endsection