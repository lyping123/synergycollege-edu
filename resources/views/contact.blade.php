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
  background: black;
  padding: 80px;
}



.contact-section {
   background-color: #f9f9f9;
   color: #333;
   padding: 80px 20px;
}

.contact-section h2 {
   font-size: 2em;
   font-weight: bold;
   margin-bottom: 20px;
}

.contact-section p {
   font-size: 1em;
   color: #666;
   margin-bottom: 40px;
}

.contact-card {
   /* background: linear-gradient(145deg, #333, #111); */
   color: black;
   padding: 20px;
   border-radius: 10px;
   transition: transform 0.3s ease, background 0.3s ease;
   box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
   background-color: white;
}

.contact-card:hover {
   transform: translateY(-10px);
   background-color: #ea2328;
   color: white;
}

.contact-card i {
   font-size: 2em;
   margin-bottom: 10px;
   color: black; /* Icon color */
}

.contact-card:hover i {
   color: white; /* Icon color changes to white on hover */
}

.contact-card h4 {
   font-size: 1.2em;
   margin-top: 10px;
   font-weight: bold;
}

.contact-card p, .contact-card a {
   color: black;
   font-size: 1em;
   line-height: 1.6;
}


.contact-card:hover p, 
.contact-card:hover a {
   color: white; /* Text color changes to white on hover */
}


.contact-card a:hover {
   color: black;
   text-decoration: underline;
}

.map-container {
   position: relative;
   width: 100%;
   margin: auto;

   overflow: hidden; /* Ensure overlay and iframe stay within rounded corners */
   box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Optional shadow */

}

.map-link-overlay {
   position: absolute;
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   background-color: rgba(0, 0, 0, 0); /* Transparent overlay */
   transition: background-color 0.3s ease;
   z-index: 1; /* Ensure it stays above the iframe */
}

.map-link-overlay:hover {
   background-color: rgba(0, 0, 0, 0.3); /* Darker overlay on hover */
   cursor: pointer;
}


h4{
    padding-top: 10px;
    padding-bottom: 20px;
}






</style>



<div class="test-banner" id="top">
  <div class="banner">
    <h2>CONTACT US</h2>
  </div>
  
</div>



<div class="container-1">
    <div class="text-center">
        <h2 style="color: white;">GET IN TOUCH WITH US</h2>
        <p style="margin-bottom:50px;color:white;">Feel free to reach out to us via phone, email, or visit our main office.</p>
        <div class="row justify-content-center">
           <!-- Phone Card -->
           <div class="col-lg-4 col-md-6 mb-4 d-flex">
              <div class="contact-card flex-fill">
                 <i class="fas fa-phone-alt"></i>
                 <h4>PHONE</h4>
                 <p>☏ 04-3984787</p>
                 <a href="https://wa.me/60124081851" target="_blank">✆ 012-4081851</a>
              </div>
           </div>
           <!-- Email Card -->
           <div class="col-lg-4 col-md-6 mb-4 d-flex">
              <div class="contact-card flex-fill">
                 <i class="fas fa-envelope"></i>
                 <h4>EMAIL</h4>
                 <p><a href="mailto:support@synergycollege.edu.my">support@synergycollege.edu.my</a></p>
              </div>
           </div>
           <!-- Address Card -->
           <div class="col-lg-4 col-md-6 mb-4 d-flex">
              <div class="contact-card flex-fill">
                 <i class="fas fa-map-marker-alt"></i>
                 <h4>HEAD OFFICE</h4>
                 <a href="https://www.google.com/maps/search/?api=1&query=32+%26+34+Jalan+Perai+Jaya+4+Bandar+Perai+Jaya+13600+Perai+Pulau+Pinang+Malaysia" target="_blank" rel="noopener noreferrer">
                    32 & 34, Jalan Perai Jaya 4, Bandar Perai Jaya, 13600 Perai, Pulau Pinang, Malaysia
                 </a>
                 
              </div>
           </div>
        </div>
        <!-- Map Section -->
        <div class="map-container mt-4">
            <!-- Overlay link that will open Google Maps in a new tab -->
            <a href="https://www.google.com/maps/place/32+%26+34+Jalan+Perai+Jaya+4+Bandar+Perai+Jaya+13600+Perai+Pulau+Pinang" 
               target="_blank" 
               rel="noopener noreferrer" 
               class="map-link-overlay">
            </a>
            <!-- Google Maps iframe embedded below the overlay link -->
            <iframe 
               src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.9975633731644!2d100.38678787461067!3d5.386474087413709!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31b15cdbd92f567b%3A0xe2b18c71b51135bc!2s32%20%26%2034%2C%20Jalan%20Perai%20Jaya%204%2C%20Bandar%20Perai%20Jaya%2C%2013600%20Perai%2C%20Pulau%20Pinang!5e0!3m2!1sen!2smy!4v1697988764909!5m2!1sen!2smy" 
               width="100%" 
               height="300px" 
               
               allowfullscreen="" 
               loading="lazy">
            </iframe>
         </div>
         
         
     </div>
     
 
  </div>








@endsection









