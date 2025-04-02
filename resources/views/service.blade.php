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
    background-attachment: fixed;
    background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('assets/images/head.jpg');
    width: 100%;
    height: 400px;
  }

  h2 {
    color: white;
    font-weight: 600;
    font-size: 40px;
    text-align: center;
    margin: 0;
  }

  .container-1 {
    background: #dddddd;
    padding: 80px 0;
  }

  .study-loan-section {
    padding: 40px 0;
    background-color: white;
  }

  .study-loan-section h3 {
    font-weight: 600;
    color: #333;
    text-align: left;
    margin-bottom: 20px;
    font-size: 28px;
  }

  .study-loan-section p {
    font-size: 16px;
    color: #555;
    line-height: 1.6;
    margin-bottom: 20px;
  }

  .study-loan-img {
    width: 100%;
    max-width: 80%;
    height: auto;
    border-radius: 10px;
    margin-top: 20px;
  }

  .student-affair-section {
    padding: 60px 0;
    background-color: #ffffff;
  }

  .student-affair-section h3 {
    font-weight: 600;
    color: #333;
    text-align: center;
    margin-bottom: 40px;
    font-size: 32px;
  }

  .icon-col {
    text-align: center;
    margin-bottom: 30px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
  }

  .icon-img {
    width: 130px;
    height: 130px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 50%;
    padding: 10px;
  }

  .icon-description {
    font-size: 16px;
    font-weight: 600;
    color: black;
    text-transform: uppercase;
    margin-top: 10px;
  }

  .icon-col p {
    font-size: 14px;
    color: #555;
    line-height: 1.6;
  }

  /* Improve spacing for responsive layout */
  @media (max-width: 768px) {
    .study-loan-img {
      width: 100%;
    }

    .icon-col {
      margin-bottom: 20px;
    }
  }

  .programs-section {
  padding: 60px 0;
  background-color: #14143e;
  
}

.program-item {
  position: relative;
  overflow: hidden;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.program-img {
  width: 100%;
  height: 300px;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.program-item:hover .program-img {
  transform: scale(1.1);
}

.program-caption {
  position: absolute;
  bottom: 0;
  background: rgba(0, 0, 0, 0.6);
  color: white;
  width: 100%;
  padding: 20px;
  text-align: left;
  visibility: hidden;
  opacity: 0;
  transition: visibility 0s, opacity 0.3s linear;
}

.program-item:hover .program-caption {
  visibility: visible;
  opacity: 1;
}

.program-caption h3 {
  font-size: 20px;
  font-weight: 700;
  margin-bottom: 5px;
}

.program-caption p {
  font-size: 14px;
  margin: 0;
}
.accordion-item{
  background-color: white;
  color: black;
}

.accordion-button {
  background-color: white;
  color: black;
  font-weight: bold;
  transition: background-color 0.3s ease, color 0.3s ease;
  
}

.accordion-button:not(.collapsed) {
  background-color: #14143e;
  color: white;
  border: 2px solid white;
}








</style>

<div class="test-banner" id="top">
  <div class="banner">
    <h2>OUR SERVICES</h2>
  </div>
</div>

<div class="container-1">
  <section class="study-loan-section">
    <div class="container">
      <div class="row align-items-center">
        @php
              $study_load=json_decode($study_load->content->content);
        @endphp
        <div class="col-md-6">
          <img src="{{ $study_load->img }}" alt="Financial Assistance" class="study-loan-img">
        </div>
        <div class="col-md-6">
          <h3>STUDY LOAN</h3>
          
          <p><strong>{{ $study_load->title }}</strong></p>
          <p align="justify">
            {{ $study_load->paragraph }}
          </p>
        </div>
      </div>
    </div>
  </section>
</div>

<section class="student-affair-section">
  <div class="container-fluid">
    <h3 style="padding-bottom: 30px;">STUDENT AFFAIR</h3>
    <div class="row">
      @foreach (json_decode($student_affair->content->content) as $item)
        <div class="col-md-2 {{ $loop->index == 0? 'offset-md-1' : '' }} icon-col">
          <img src="{{ $item->img }}" alt="Icon 1" class="icon-img">
          <p class="icon-description">{{ $item->title }}</p>
          <p>{{ $item->paragraph }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="programs-section">
    <div class="container text-center">
        <h3 style="color: white; font-weight: 700;">CONGRATULATIONS TO ALL OF OUR GRADUATES!</h3>

        <br>
        <h4 style="color: white; font-weight: 600;padding-bottom:50px;">SYNERGY COLLEGE CONVOCATION 2024 GROUP PHOTO</h4>
      <div class="row">
        <!-- Group -->
        @foreach( json_decode($convocation->content->content) as $item)
          <div class="col-md-4 mb-4">
            <div class="program-item">
              <img src="{{ $item->img }}" alt="Program 0" class="program-img">
              <div class="program-caption">
                <h3>{{ $item->content }}</h3>
                
              </div>
            </div>
          </div>
        @endforeach
        
        <!-- Program 1 -->
        {{-- <div class="col-md-4 mb-4">
          <div class="program-item">
            <img src="assets/images/12.jpeg" alt="Program 1" class="program-img">
            <div class="program-caption">
              <h3>COMPUTER NETWORKING</h3>
              
            </div>
          </div>
        </div>
        <!-- Program 2 -->
        <div class="col-md-4 mb-4">
          <div class="program-item">
            <img src="assets/images/13.jpeg" alt="Program 2" class="program-img">
            <div class="program-caption">
              <h3>ELECTRONIC & ENGINEERING</h3>
              
            </div>
          </div>
        </div>
        <!-- Program 3 -->
        <div class="col-md-4 mb-4">
          <div class="program-item">
            <img src="assets/images/14.jpeg" alt="Program 3" class="program-img">
            <div class="program-caption">
              <h3>GRAPHIC MULTIMEDIA</h3>
            </div>
          </div>
        </div>
        <!-- Program 4 -->
        <div class="col-md-4 mb-4">
          <div class="program-item">
            <img src="assets/images/15.jpeg" alt="Program 4" class="program-img">
            <div class="program-caption">
              <h3>PROGRAMMING & APPLICATION DEVELOPMENT</h3>
              
            </div>
          </div>
        </div>
        <!-- Program 5 -->
        <div class="col-md-4 mb-4">
          <div class="program-item">
            <img src="assets/images/16.jpeg" alt="Program 5" class="program-img">
            <div class="program-caption">
              <h3>ACCOUNTING</h3>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </section>
  

  <section class="container-1">
    <div class="container my-4">
        <h3 class="text-center" style="font-weight: 600; color: #333; margin-bottom: 50px;">REFUNDS POLICY</h3>
        <div class="accordion" id="refundsAccordion">
            <!-- Accordion Item 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                        REFUND POLICY
                    </button>
                </h2>
                @php
                    $refund_policy=json_decode($policy->content->content)->refund_policy;
                @endphp
                <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#refundsAccordion">
                    <div class="accordion-body">
                        <img src="{{ $refund_policy }}" class="img-fluid" alt="Refund Policy" style="max-width: 100%; height: auto; border-radius: 10px;">
                    </div>
                </div>
            </div>

            <!-- Accordion Item 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        STUDENT HANDBOOK
                    </button>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#refundsAccordion">
                    <div class="accordion-body">
                        @foreach (json_decode($policy->content->content)->student_handbook as $item)
                        <img src="{{ $item }}" class="img-fluid" alt="Student Handbook 1" style="max-width: 100%; height: auto; border-radius: 10px;">
                        @endforeach
                        
                        {{-- <img src="assets/images/book2.jpg" class="img-fluid" alt="Student Handbook 2" style="max-width: 100%; height: auto; border-radius: 10px;">
                        <img src="assets/images/book3.jpg" class="img-fluid" alt="Student Handbook 3" style="max-width: 100%; height: auto; border-radius: 10px;">
                        <img src="assets/images/book4.jpg" class="img-fluid" alt="Student Handbook 4" style="max-width: 100%; height: auto; border-radius: 10px;">
                        <img src="assets/images/book5.jpg" class="img-fluid" alt="Student Handbook 5" style="max-width: 100%; height: auto; border-radius: 10px;">
                        <img src="assets/images/book6.jpg" class="img-fluid" alt="Student Handbook 6" style="max-width: 100%; height: auto; border-radius: 10px;"> --}}
                    </div>
                </div>
            </div>

            

            <!-- Continue adding accordion items here up to Item 13 -->
        </div>
    </div>
</section>


  
        <!-- Continue adding similar blocks for each step until all 13 images are included -->
  
      </div>
    </div>
  </section>
  
  

@endsection
