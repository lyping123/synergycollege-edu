@extends('layout')
@section('content')

<style>
  .banner {
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    padding: 236px 0px 130px 0px;
    position: relative;
    overflow: hidden;
    background-attachment: fixed; /* This will make the image fixed */
    background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('assets/images/head.jpg');
    /* Adjust rgba(0, 0, 0, 0.5) to control the darkness */
    width: 100%;
    height: 400px;
  }

  h2 {
    color: white;
    font-weight: 600;
    font-size: 40px;
    text-align: center;
  }

  .container-1 {
    background: lightgray;
    padding: 80px;
  }

  #staff-directory {
    background-color: #f8f9fa;
  }

  .staff-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    transition: transform 0.3s;
  }

  .staff-card:hover {
    transform: translateY(-10px);
  }

  .staff-img {
    width: 120px;
    height: 120px;
    object-fit: cover;
  }

  h2 {
    font-family: 'Arial', sans-serif;
    font-size: 2.5rem;
    font-weight: 600;
  }

  .fas {
    color: #007bff;
  }

  .btn-primary {
    background-color: #007bff;
    border: none;
  }

  .btn-primary:hover {
    background-color: #0056b3;
  }

  @media (max-width: 768px) {
    .staff-card {
      margin: 0 auto;
    }
  }

  h6 {
    font-weight: 700;
  }

  h4 {
    margin-top: 30px;
    font-weight: 700;
  }

  .fas {
    color: #ea2328; /* Set your desired color here */
  }

  .btn {
    background-color: white;
    border: 1px solid black;
    color: black;
  }

  .btn:hover {
    background-color: #14143e;
    color: #faea18;
    border: none;
  }
</style>

<div class="test-banner" id="top">
  <div class="banner">
    <h2>SYNERGY COLLEGE STAFF DIRECTORY</h2>
  </div>
</div>

<div class="container-1">
  <div class="container-fluid px-4 mt-5">
    <div class="row">

      @foreach(json_decode($staff->content->content) as $person)
      <!-- Staff Member -->
      <div class="col-md-3 mb-4 col-sm-6 col-xs-12">
        <div class="staff-card text-center" style="padding-top: 50px; padding-bottom:50px;">
          <img src="{{ $person->img }}" alt="{{ $person->name }}" class="staff-img mb-3">
          <h4>{{ $person->name }}</h4>
          <p style="margin-bottom: 50px;">{{ $person->position }}</p>
          <u><h6>CONTACT INFORMATION</h6></u>
          <u>
            <p style="overflow: hidden;"><i class="fas fa-envelope"></i>
              <a href="mailto:{{ $person->email }}"   target="_blank">{{ $person->email }}</a>
            </p>
          </u>
          <p><i class="fas fa-phone"></i>
            <a href="https://wa.me/{{ $person->phone }}" target="_blank">{{ $person->phone }}</a>
          </p>
          <a href="https://wa.me/{{ $person->phone }}" class="btn btn-primary btn-sm" target="_blank">CONTACT</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
