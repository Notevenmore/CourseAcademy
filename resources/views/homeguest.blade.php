<section class="home">
  <div class="heading">
    <div class="content">
      <h1>Apa itu Course Shop?</h1>
      <p>platform pembelajaran online yang berfokus pada kebutuhan dan minat pembelajar, menawarkan berbagai kursus yang relevan dan terkini, dirancang oleh para ahli untuk membantu pembelajar mencapai tujuan mereka serta memiliki sistem pembelajaran yang terstruktur dan mudah diikuti, dengan fitur pendukung yang membantu pelajar belajar secara efektif.</p>
    </div>
  </div>
  <div class="list-product">
    @foreach($courses as $course)
      <div class="product">
        <p>{{ $course->name }}</p>
      </div>
    @endforeach
  </div>
  <div class="reason">
    <h1>"Kenapa Course Academy Berbeda?"</h1>
    <p>Course Academy melakukan pendekatan yang berpusat pada pembelajar, materi yang diberikan relevan dan terkini, sistem pembelajaran yang diberikan terstruktur, dan fitur-fitur yang disediakan mendukung kesuksesan pembelajar. Sehingga,  Course Academy menjadi pilihan yang tepat bagi para pembelajar yang ingin meningkatkan keterampilan dan pengetahuan mereka.</p>
  </div>
  <div class="promotion">
    <div class="text-content">
      <h1>Belajar Fleksibel Sesuai Jadwal Anda</h1>
      <p>Belajar kapan pun, dimana pun, secara mandiri. Bebas memilih kelas sesuai minat belajar. Akses Seumur Hidup ke kelas dan forum diskusi setelah lulus.</p>
      <hr>
      <h1>Learning Path</h1>
      <p>Learning path akan membantu anda dalam belajar di Academy dengan kurikulum yang dibangun bersama pelaku industri ternama.</p>
    </div>
  </div>
  <div class="link-login-promotion">
    <p>Ayo belajar lebih terarah dengan learning path</p>
    <a href="{{ route('register') }}">Buat Akun</a>
  </div>
  <div class="line"></div>
  @include('layouts.footer')
</section>