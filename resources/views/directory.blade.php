@extends('layout')
@section('content')

<style>
  .banner{
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

  h2{
    color: white;
    font-weight: 600;
    font-size: 40px;
    text-align: center;
  }

.container-1{
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

h6{
    font-weight: 700;
}

h4{
    margin-top: 30px;
    font-weight: 700;
}

.fas {
    color: #ea2328; /* Set your desired color here */
    
}

.btn{
    background-color: white;
    border: 1px solid black;
    color: black;
}

.btn:hover{
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
    {{-- <section id="staff-directory" class="py-5"> --}}
        <div class="container-fluid px-4">
            {{-- <h2 class="text-center mb-4">SYNERGY COLLEGE STAFF DIRECTORY</h2> --}}
            <div class="row">
                <!-- Staff Member 1 -->
                <div class="col-md-3 mb-4" >
                    <div class="staff-card text-center" style="padding-top: 50px; padding-bottom:50px;">
                        <img src="assets/images/consultation.png" alt="Staff 1" class="staff-img mb-3">
                        <h4>MR.KC NEOH</h4>
                        <p style="margin-bottom: 50px;">COLLEGE ADVISOR</p>
                        <u><h6>CONTACT INFORMATION</h6></u>
                        <p><i class="fas fa-envelope"></i> 
        <a href="mailto:support@synergycollege.edu.my" target="_blank">support@synergycollege.edu.my</a>
    </p>
    <p><i class="fas fa-phone"></i> 
        <a href="https://wa.me/60124081851" target="_blank">012-4081851</a>
    </p>
                        
                        <a href="https://wa.me/60124081851" class="btn btn-primary btn-sm" target="_blank">CONTACT</a>
                    </div>
                </div>
                <!-- Staff Member 2 -->
                <div class="col-md-3 mb-4">
                    <div class="staff-card text-center" style="padding-top: 50px; padding-bottom:50px;">
                        <img src="assets/images/analyst.png" alt="Staff 1" class="staff-img mb-3">
                        <h4>MS.SY CH'NG</h4>
                        <p style="margin-bottom: 50px;">REGISTRAR</p>
                        <u><h6>CONTACT INFORMATION</h6></u>
                        <p><i class="fas fa-envelope"></i> 
                            <a href="mailto:sy@synergycollege.edu.my" target="_blank">sy@synergycollege.edu.my</a>
                        </p>
                        <p><i class="fas fa-phone"></i> 
                            <a href="https://wa.me/60195720999" target="_blank">019-5720999</a>
                        </p>
                        <a href="https://wa.me/60195720999" target="_blank" class="btn btn-primary btn-sm">CONTACT</a>
                    </div>
                </div>
                <!-- Staff Member 3 -->
                <div class="col-md-3 mb-4">
                    <div class="staff-card text-center" style="padding-top: 50px; padding-bottom:50px;">
                        <img src="assets/images/businesswoman.png" alt="Staff 1" class="staff-img mb-3">
                        <h4>MS.SITI</h4>
                        <p style="margin-bottom: 50px;">ADMIN DEPARTMENT</p>
                        <u><h6>CONTACT INFORMATION</h6></u>
                        <p><i class="fas fa-envelope"></i> 
                            <a href="mailto:info@synergycollege.edu.my" target="_blank">info@synergycollege.edu.my</a>
                        </p>
                        <p><i class="fas fa-phone"></i> 
                            <a href="https://wa.me/60164456145" target="_blank">016-4456145</a>
                        </p>
                        
                        <a href="https://wa.me/60164456145" target="_blank" class="btn btn-primary btn-sm">CONTACT</a>
                    </div>
                </div>
                <!-- Staff Member 4 -->
                <div class="col-md-3 mb-4">
                    <div class="staff-card text-center" style="padding-top: 50px; padding-bottom:50px;">
                        <img src="assets/images/discussion.png" alt="Staff 1" class="staff-img mb-3">
                        <h4>MR.CC NG</h4>
                        <p style="margin-bottom: 50px;">COUNSELLOR</p>
                        <u><h6>CONTACT INFORMATION</h6></u>


                        <p><i class="fas fa-envelope"></i> 
                            <a href="mailto:c2@synergycollege.edu.my" target="_blank">c2@synergycollege.edu.my</a>
                        </p>
                        <p><i class="fas fa-phone"></i> 
                            <a href="https://wa.me/60124346832" target="_blank">012-4346832</a>
                        </p>
           
                        <a href="https://wa.me/60124346832" target="_blank" class="btn btn-primary btn-sm">CONTACT</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    
  
</div>




@endsection









