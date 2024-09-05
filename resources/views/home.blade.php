@extends('layouts.navbar')

@section('content')

  @auth

    @include('homestudent')

  @else

    @include('homeguest')
      
  @endauth

@endsection
</body>
</html>