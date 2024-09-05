@extends('layouts.auth')
@section('authorization-content')
<section class="register" style="height: 601px;">
  <h1>REGISTER</h1>
  <form action="{{ route('authenticate') }}" method="post">
    @csrf
    <input type="text" name="name" id="username" placeholder="Username">
    <input type="email" name="email" id="email" placeholder="Email">
    <input type="password" name="password" id="password" placeholder="Password">
    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
    <button type="submit" name="register">SUBMIT</button>
  </form>
  <p>Sudah memiliki akun? Lakukan <a href="{{ route('login') }}">login</a> sekarang!</p>
</section>
@endsection