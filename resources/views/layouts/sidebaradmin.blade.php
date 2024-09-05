<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #702228;">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
      
      <div class="sidebar-brand-text mx-3"><img src="{{ asset('img/CourseShop Logo admin.png') }}" width=50px height=50px alt=""></div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
      <a class="nav-link" href="{{ route('admin.index') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>{{ $title }}</span></a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">
      Menu
  </div>
  <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.index') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Dashboard</span>
      </a>
      <a class="nav-link" href="{{ route('purchase-data') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Pembelian</span>
      </a>
      <a class="nav-link" href="{{ route('userdata.index') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Data User</span>
      </a>
      <a class="nav-link" href="{{ route('course-data') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>List Course</span>
      </a>
  </li>
  <hr class="sidebar-divider d-none d-md-block">
</ul>