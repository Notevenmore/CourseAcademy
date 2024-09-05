@include('layouts.header')
<body style="background-color: #702228;">
  <nav class="navbar">
    
    @if(!Request::routeIs(['admin.index','purchase-data', 'course-data', 'userdata.index', 'course.create']))

      <div class="logo">
        <a href="{{ route('home') }}">
          <img src="{{ asset('img/CourseShopLogo.png') }}" alt="Logo Course Shop">
        </a>
      </div>
      <div class="menu">
        <ul>
          <li><a href="{{ route('langganan.index') }}">Langganan</a></li>
          <li><a href="{{ route('jurusan') }}">Learning Path</a></li>
          <li><a href="{{ route('lainnya.create') }}">Pengajuan Mentor</a></li>
        </ul>
      </div>

    @endif

    @auth

      <div class="menu-profile" style="z-index: 4;">
        <ul>
          @if(Auth::user()->admin->status)

            @if(!Request::routeIs(['admin.index','purchase-data', 'course-data', 'userdata.index', 'course.create']))

              <li><a href="{{ route('admin.index') }}">Admin</a></li>

            @else

              <li><a href="{{ route('home') }}">Beranda</a></li>

            @endif

          @endif
          
          @if(Auth::user()->mentor->status)

            @if(!Request::routeIs(['mentor.index']))

              <li><a href="{{ route('mentor.index') }}">Mentor</a></li>

            @else

              <li><a href="{{ route('home') }}">Beranda</a></li>

            @endif

          @endif

          <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
      </div>

      @if(Request::routeIs(['admin.index','purchase-data', 'course-data', 'userdata.index', 'course.create'])) 
      
        <img src="{{ asset('img/Profil.jpg') }}" alt="" style="width: 70px; height: 70px;margin-left: auto; margin-right: 0" onclick="showMenu()">
        
      @else
        
        <img src="{{ asset('img/Profil.jpg') }}" alt="" style="width: 70px; height: 70px;" onclick="showMenu()">
        
      @endif
    
    @else
      
      <a href="{{ route('login') }}" class="login-button">Login</a>
    
    @endauth

  </nav>
  
  @if(Request::routeIs('jurusan'))
    
    @include('content-jurusan')
    
  @elseif(Request::routeIs(['course', 'course-class']))
  
    @include('content-course')
  
  @endif

  @yield('content')

  @if(!Request::routeIs(['admin.index','purchase-data', 'course-data', 'userdata.index']))

      <script src="{{ asset('js/script.js') }}"></script>
    
  @endif

  @if(Request::routeIs('learn'))

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


  @endif

</body>
</html>