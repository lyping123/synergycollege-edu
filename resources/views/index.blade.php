@extends('layout')

@section('content')
<style>
.right-image img {
    max-width: 100%;
    height: auto;
    display: block; 
    margin-bottom: 20px;
}
.item .thumb img{
  height: 300px
}


.item .hover-effect{
  background-color: transparent !important;
}
/* Responsive Design for Small Screens */
@media (max-width: 576px) {
    .inner-content {
        margin-left: 50px; /* Reduce padding */
        padding: 5px;
        z-index: 1000;
    }

    .inner-content h4 {
        font-size: 16px; /* Smaller title */
    }

    .inner-content span {
        font-size: 12px; /* Adjust text size */
    }
}
</style>

<div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12 align-self-center">
              {{-- <div class="owl-carousel owl-banner"> --}}
                <div class="item ">
                  {{-- <h6>WELCOME TO SYNERGY COLLEGE</h6> --}}
                  <h2>WELCOME TO SYNERGY COLLEGE</h2>
                  <p style="color: #bfbec4;">"EMPOWERING FUTURE LEADERS, ONE STEP AT A TIME."</p>
                  <div class="down-buttons">
                    {{-- <div class="main-blue-button-hover">
                      <a href="#contact" class="">EXPLORE COURSES</a>
                    </div> --}}
                    {{-- <div class="call-button">
                      <a href="#"><i class="fa fa-phone"></i> 010-020-0340</a>
                    </div> --}}
                  </div>
                

                </div>
                {{-- <div class="item header-text">
                  <h6>Online Marketing</h6>
                  <h2>Get the <em>best ideas</em> for <span>your website</span></h2>
                  <p>You are NOT allowed to redistribute this template ZIP file on any Free CSS collection websites. Contact us for more info. Thank you.</p>
                  <div class="down-buttons">
                    <div class="main-blue-button-hover">
                      <a href="#services">Our Services</a>
                    </div>
                    <div class="call-button">
                      <a href="#"><i class="fa fa-phone"></i> 090-080-0760</a>
                    </div>
                  </div>
                </div> --}}
                {{-- <div class="item header-text">
                  <h6>Video Tutorials</h6>
                  <h2>Watch <em>our videos</em> for your <span>projects</span></h2>
                  <p>Please <a rel="nofollow" href="https://www.paypal.me/templatemo" target="_blank">support us</a> a little via PayPal if this digital marketing HTML template is useful for you. Thank you.</p>
                  <div class="down-buttons">
                    <div class="main-blue-button-hover">
                      <a href="#video">Watch Videos</a>
                    </div>
                    <div class="call-button">
                      <a href="#"><i class="fa fa-phone"></i> 050-040-0320</a>
                    </div>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  
  <a href="#{{session()->has('id') ? session('id') : '' ;}}" id="scrollLink" style="display: none;"><button>success</button></a>


  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center col-sm-12">
          <div class="right-image">
            <img src="assets/images/section2.jpg" alt="" style="display: block;" class="main-image" style="margin-bottom: 80px;padding-right:30px;">
            <img src="assets/images/section2a.jpg" alt="" style="display: block;" style="padding-right:30px;">
          </div>
          
        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="section-heading">
            <h2>" <span style="color:#ea2328">ABOUT US</span> "</h2>
            <p>At Synergy College, we believe in creating a collaborative environment that nurtures creativity, fosters personal growth, and equips students with the skills they need to thrive in a dynamic world. Our diverse programs are designed to blend theoretical knowledge with practical experience, ensuring our graduates are well-prepared for their future careers. Join us on a journey of discovery and empowerment, where your aspirations become reality.
            </p>
            <div class="row">
              <div class="col-lg-4 col-sm-12">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="assets/images/comment.png" alt="">
                    </div>
                    <div class="count-digit">OUR VERSION</div>
                    {{-- <div class="count-title">SEO Projects</div> --}}
                    <p>Kolej Synergy will be a world leader in the integration of:
                      <br>
                      ➤ Teaching and learning.
                      <br> <br>
                      ➤Advancement of the knowledge base through research.
                      <br> <br>
                      ➤Leadership in service and outreach.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-12">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="assets/images/goal.png" alt="">
                    </div>
                    <div class="count-digit">OUR MISSION</div>
                    {{-- <div class="count-title">Websites</div> --}}
                    <p>The Mission of Kolej Synergy is to provide career-focused quality education that caters to the intellectual, social and cultural needs of learns.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-12">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="assets/images/contact.png" alt="">
                    </div>
                    <div class="count-digit">CONTACT US</div>
                    {{-- <div class="count-title">Satisfied Clients</div> --}}
                    <p></p>
                    <br>
                    <div class="main-blue-button-hover">
                      <a href="/contact" class="learn">LEARN MORE</a>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  


  <div id="portfolio" class="our-portfolio section">
    <div class="portfolio-left-dec">
      <img src="assets/images/portfolio-left-dec.png" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h2>NEWS AND EVENTS</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-portfolio">
            <div class="item">
              <div class="thumb">
                <img src="assets/images/rumah kasih sayang.jpg" alt="">
                <div class="hover-effect" >
                   <div class="inner-content">
                    <a href="#"><h4>CHARITY FOR ORPHANS EVENTS</h4></a>
                    <span><strong>📅 Date:</strong> 02 FEBRUARY 2025</span><br>
                    <span><strong>🕒 Time:</strong> 1:00 PM - 4:00 PM</span><br>
                    <span><strong>📍 Location:</strong> BUKIT MERTAJAM</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/bownling.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>BOWLING TOURNAMENT</h4></a>
                    <span><strong>📅 Date:</strong> 16 JANUARY 2025</span><br>
                    <span><strong>🕒 Time:</strong> 10:00 AM - 2:00 PM</span><br>
                    <span><strong>📍 Location:</strong>Mega Lanes Bowling Centreg</span>
                  </div> 
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/convecation.jpg" alt="">
                <div class="hover-effect">
                 <div class="inner-content">
                    <a href="#"><h4>CONVOCATION 2024</h4></a>
                    <span><strong>📅 Date:</strong> 20 DECEMBER 2024</span><br>
                    <span><strong>🕒 Time:</strong> 9:00 AM - 12:00 PM</span><br>
                    <span><strong>📍 Location:</strong> Sunway Sports Center</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/badminton.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>BADMINTON TOURNAMENT</h4></a>
                    <span><strong>📅 Date:</strong> 08 DECEMBER 2023</span><br>
                    <span><strong>🕒 Time:</strong> 8:00 AM - 5:00 PM</span><br>
                    <span><strong>📍 Location:</strong> Sunway Sports Center</span>
                  </div>
                </div>
              </div>
            </div>
            {{-- <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-03.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>7th Project</h4></a>
                    <span>SEO &amp; Marketing</span>
                  </div>
                </div>
              </div>
            </div> --}}
            {{-- <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-04.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>8th Project</h4></a>
                    <span>SEO &amp; Marketing</span>
                  </div>
                </div>
              </div>
            </div> --}}
            {{-- <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-01.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>9th Project</h4></a>
                    <span>SEO &amp; Marketing</span>
                  </div>
                </div>
              </div>
            </div> --}}
            {{-- <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-02.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>Project Ten</h4></a>
                    <span>SEO &amp; Marketing</span>
                  </div>
                </div>
              </div>
            </div> --}}
            {{-- <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-03.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>Project Eleven</h4></a>
                    <span>SEO &amp; Marketing</span>
                  </div>
                </div>
              </div>
            </div> --}}
            {{-- <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-04.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>12th Project</h4></a>
                    <span>SEO &amp; Marketing</span>
                  </div>
                </div>
              </div>
            </div> --}}

            
          </div>
        </div>
      </div>
    </div>
  </div>








  <div id="services" class="our-services section">
    <div class="services-right-dec">
      <img src="assets/images/services-right-dec.png" alt="">
    </div>
    <div class="container">
      <div class="services-left-dec">
        {{-- <img src="assets/images/services-left-dec.png" alt=""> --}}
      </div>
      <div class="row">
        <div class="col-lg-8 offset-lg-2 col-sm-12">
          <div class="section-heading">
            <h2 style="color: white">SYNERGY COLLEGE HISTORY</h2>

            <p style="color: #9b9bad; margin-top:50px; ">
                Established in 2001, Synergy College is a significant contributor to the field of professional and skill education in Malaysia.
              <br><br>
  Currently, the college is offering TVET Diploma and International Professional Qualifications to local and international students. We are an accredited International College from JPK, Malaysia.
  <br><br>
  Students are eligible to apply government study loan through college. While delivering the government accredited TVET Diploma program, we do prepare the students to sit for international professional examination. Most of our student are capable to obtain double qualifications.
  <br><br>
  All these programs are in the areas of high demand and are well recognized by local and international industries. Our students are undergo a learning system that is holistic and equipping them with the skills and relevant knowledge that can keep them in good stead as they join the workforce.
  <br><br>
  The Malaysian Qualifications Agency (MQA), Ministry of Education and the Department of Skills Development (JPK), Ministry of Human Resources are working together to operate TVET Diploma.
            </p>

            
            <hr style="border: none; border-top: 5px dotted white; height: 0;margin-top:50px;">


           
        
            
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-services">
            {{-- <div class="item">
              <h4>Learn More about our Guidelines</h4>
              <div class="icon"><img src="assets/images/service-icon-01.png" alt=""></div>
              <p>Feel free to use this template for your business</p>
            </div>
            <div class="item">
              <h4>Develop The Best Strategy for Business</h4>
              <div class="icon"><img src="assets/images/service-icon-02.png" alt=""></div>
              <p>Get to know more about the topic in details</p>
            </div>
            <div class="item">
              <h4>UI / UX Design and Development</h4>
              <div class="icon"><img src="assets/images/service-icon-03.png" alt=""></div>
              <p>Get to know more about the topic in details</p>
            </div>
            <div class="item">
              <h4>Discover &amp; Explore our SEO Tips</h4>
              <div class="icon"><img src="assets/images/service-icon-04.png" alt=""></div>
              <p>Feel free to use this template for your business</p>
            </div>
            <div class="item">
              <h4>Optimizing your websites for Speed</h4>
              <div class="icon"><img src="assets/images/service-icon-01.png" alt=""></div>
              <p>Get to know more about the topic in details</p>
            </div>
            <div class="item">
              <h4>See The Strategy In The Market</h4>
              <div class="icon"><img src="assets/images/service-icon-02.png" alt=""></div>
              <p>Get to know more about the topic in details</p>
            </div>
            <div class="item">
              <h4>Best Content Ideas for your pages</h4>
              <div class="icon"><img src="assets/images/service-icon-03.png" alt=""></div>
              <p>Feel free to use this template for your business</p>
            </div>
            <div class="item">
              <h4>Optimizing Speed for your web pages</h4>
              <div class="icon"><img src="assets/images/service-icon-04.png" alt=""></div>
              <p>Get to know more about the topic in details</p>
            </div>
            <div class="item">
              <h4>Accessibility for mobile viewing</h4>
              <div class="icon"><img src="assets/images/service-icon-01.png" alt=""></div>
              <p>Get to know more about the topic in details</p>
            </div>
            <div class="item">
              <h4>Content Ideas for your next project</h4>
              <div class="icon"><img src="assets/images/service-icon-02.png" alt=""></div>
              <p>Feel free to use this template for your business</p>
            </div>
            <div class="item">
              <h4>UI &amp; UX Design &amp; Development</h4>
              <div class="icon"><img src="assets/images/service-icon-03.png" alt=""></div>
              <p>Get to know more about the topic in details</p>
            </div>
            <div class="item">
              <h4>Discover the digital marketing trend</h4>
              <div class="icon"><img src="assets/images/service-icon-04.png" alt=""></div>
              <p>Get to know more about the topic in details</p>
            </div> --}}
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-4">
      <div class="row">
        @foreach($images as $image)
        <div class="col-md-3">
            <img src="{{ asset('assets/images/'.$image->image_url) }}" class="img-fluid animated-img" alt="{{ $image->image_name }}"
                 style="border: 3px solid white; border-radius: 5px;"
                 data-toggle="modal" data-target="#imageModal" data-image="{{ asset($image->image_url) }}">
        </div>
    @endforeach
    
      </div>
  </div>
  
  <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                @foreach($images as $image)
                    <img src="{{ asset('assets/images/'.$image->image_url) }}" class="img-fluid animated" alt="{{ $image->image_name }}"
                    style="border: 3px solid white; border-radius: 5px;"
                    data-toggle="modal" data-target="#imageModal" data-image="{{ asset($image->image_url) }}" >
                 @endforeach
              </div>
          </div>
      </div>
  </div>
  


  </div>

  {{-- <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <!-- Flex container to hold boxes on the left and text on the right -->
        <div class="content-wrapper">
          <!-- Left side: 2x2 grid of boxes -->
          <div class="col-lg-4 align-self-center boxes">
            <div class="box">Column 1</div>
            <div class="box">Column 2</div>
            <div class="box">Column 3</div>
            <div class="box">Column 4</div>
          </div>
          
          <!-- Right side: Text description -->
          <div class="col-lg-6 section-heading">
            <h2>Grow your website with our <em>SEO Tools</em> &amp; <span>Project</span> Management</h2>
            <p>You can browse free HTML templates on Too CSS website. Visit the website and explore the latest website templates for your projects.</p>
            <div class="row">
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="assets/images/service-icon-01.png" alt="">
                    </div>
                    <div class="count-digit">320</div>
                    <div class="count-title">SEO Projects</div>
                    <p>Lorem ipsum dolor sit amet, consectetur.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="assets/images/service-icon-02.png" alt="">
                    </div>
                    <div class="count-digit">640</div>
                    <div class="count-title">Websites</div>
                    <p>Lorem ipsum dolor sit amet, consectetur.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="assets/images/service-icon-03.png" alt="">
                    </div>
                    <div class="count-digit">120</div>
                    <div class="count-title">Satisfied Clients</div>
                    <p>Lorem ipsum dolor sit amet, consectetur.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Right side -->
        </div>
      </div>
    </div>
  </div>
   --}}




   <div id="pricing" class="pricing-tables">
    <div class="tables-left-dec">
      {{-- <img src="assets/images/tables-left-dec.png" alt=""> --}}
    </div>
    <div class="tables-right-dec">
      {{-- <img src="assets/images/tables-right-dec.png" alt=""> --}}
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h2>WHY CHOOSE SYNERGY COLLEGE</h2>
            
          </div>
        </div>
      </div>
      <div class="row">
        <div class=" col-md-4 col-lg-3 col-sm-12">
          <div class="item first-item">
            <img src="assets/images/school.png" alt="" style="width: 100px;">
            <h4>HIGHER VOCATIONAL EDUCATION PROVIDER</h4>
          </div>
        </div>
    
        <div class=" col-md-4 col-lg-3 col-sm-12">
          <div class="item first-item">
            <img src="assets/images/course.png" alt="" style="width: 100px;">
            <h4>PROVIDE THOUSANDS HANDS-ON PRACTICAL LEARN ALL USEFUL THEORY THROUGH PRACTICAL</h4>
          </div>
        </div>
    
        <div class=" col-md-4 col-lg-3 col-sm-12">
          <div class="item first-item">
            <img src="assets/images/internship.png" alt="" style="width: 100px;">
            <h4>INDUSTRIAL PLACEMENT/ INTERNSHIP/ INDUSTRIAL TRAINING</h4>
          </div>
        </div>
    
        <div class="col-md-4 col-lg-3 col-sm-12">
          <div class="item first-item">
            <img src="assets/images/award.png" alt="" style="width: 100px;">
            <h4>MULTIPLE QUALIFICATIONS IN ONE PROGRAM</h4>
          </div>
        </div>
    </div>
    
    </div>
  </div>






  <div id="portfolio" class="our-portfolio section">
    <div class="portfolio-left-dec">
      <img src="assets/images/portfolio-left-dec.png" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h2>WHO SHOULD TAKE THIS TVET PROGRAM</h2>
            {{-- <span>Our Portfolio</span> --}}
            <h4 style="margin-top: 80px;">Skilled Vocational Diploma SKILLED VOCATIONAL</h4>
            <h5 style="margin-top: 50px;">✔ Those with SPM / UEC / STPM or any similar equivalent international secondary school qualification.</h5>
            <h5 style="margin-top: 50px;">✔ Those without above minimum entry qualifications also can be considered.</h5>
          </div>
        </div>
      </div>
    </div>
    {{-- <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-portfolio">
            <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-01.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a rel="sponsored" href="https://templatemo.com/tm-564-plot-listing" target="_parent"><h4>First Project</h4></a>
                    <span>Plot Listing</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-02.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>Project Two</h4></a>
                    <span>SEO &amp; Marketing</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-03.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a rel="sponsored" href="https://templatemo.com/tm-562-space-dynamic" target="_parent"><h4>Third Project</h4></a>
                    <span>Space Dynamic SEO</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-04.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>Project Four</h4></a>
                    <span>Website Marketing</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-01.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>Fifth Project</h4></a>
                    <span>Digital Assets</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-02.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>Sixth Project</h4></a>
                    <span>SEO &amp; Marketing</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-03.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>7th Project</h4></a>
                    <span>SEO &amp; Marketing</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-04.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>8th Project</h4></a>
                    <span>SEO &amp; Marketing</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-01.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>9th Project</h4></a>
                    <span>SEO &amp; Marketing</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-02.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>Project Ten</h4></a>
                    <span>SEO &amp; Marketing</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-03.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>Project Eleven</h4></a>
                    <span>SEO &amp; Marketing</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-04.jpg" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>12th Project</h4></a>
                    <span>SEO &amp; Marketing</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
  </div>

  
  
  <div id="subscribe" class="subscribe">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          {{-- <div class="inner-content"> --}}
            <div class="container mt-5">
              <div class="form-container">
                  <h2>STUDENT REGISTRATION</h2>
          
                  <!-- Display validation errors and success messages -->
                   
          
                  @if (session('success'))
                      <div class="alert alert-success">
                          {{ session('success') }}
                      </div>
                  @endif 
          
                  <form action="{{ route('student.submit') }}" method="POST">
                      @csrf
                      @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
                      <div class="mb-3">
                          <label for="full_name" class="form-label">Full Name</label>
                          <input type="text" class="form-control" id="full_name" name="full_name">
                      </div>
                      <div class="mb-3">
                          <label for="ic_no" class="form-label">IC No</label>
                          <input type="text" class="form-control" id="ic_no" name="ic_no" required>
                      </div>
                      <div class="mb-3">
                          <label for="nationality" class="form-label">Nationality</label>
                          <select class="form-control" id="nationality" name="nationality" required>
                              <option value="Malaysian">Malaysian</option>
                              <option value="Other">Other</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Gender</label><br>
                          <input type="radio" name="gender" value="Male" required> Male
                          <input type="radio" name="gender" value="Female" required> Female
                      </div>
                      <div class="mb-3">
                          <label for="race" class="form-label">Race</label>
                          <input type="text" class="form-control" id="race" name="race" required>
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Marital Status</label><br>
                          <input type="radio" name="marital_status" value="Single" required> Single
                          <input type="radio" name="marital_status" value="Married" required> Married
                      </div>
                      <div class="mb-3">
                          <label for="address" class="form-label">Address</label>
                          <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                      </div>
                      <div class="mb-3">
                          <label for="postcode" class="form-label">Postcode</label>
                          <input type="text" class="form-control" id="postcode" name="postcode" required>
                      </div>
                      <div class="mb-3">
                          <label for="state" class="form-label">State</label>
                          <select class="form-control" id="state" name="state" required>
                              <option value="Johor">Johor</option>
                              <option value="Kedah">Kedah</option>
                              <option value="Kelantan">Kelantan</option>
                              <option value="Malacca">Malacca</option>
                              <option value="Negeri Sembilan">Negeri Sembilan</option>
                              <option value="Pahang">Pahang</option>
                              <option value="Penang">Penang</option>
                              <option value="Perak">Perak</option>
                              <option value="Perlis">Perlis</option>
                              <option value="Sabah">Sabah</option>
                              <option value="Sarawak">Sarawak</option>
                              <option value="Selangor">Selangor</option>
                              <option value="Terengganu">Terengganu</option>
                              <option value="Kuala Lumpur">Kuala Lumpur</option>
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="contact_no" class="form-label">Contact No (H/P)</label>
                          <input type="text" class="form-control" id="contact_no" name="contact_no" required>
                      </div>
                      <div class="mb-3">
                          <label for="guardian_contact_no" class="form-label">Guardian Contact No</label>
                          <input type="text" class="form-control" id="guardian_contact_no" name="guardian_contact_no" required>
                      </div>
                      <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email" required>
                      </div>
                      <div class="mb-3">
                          <label for="course" class="form-label">Course</label>
                          <select class="form-control" id="course" name="course" required>
                              <option value="Accounting">Accounting</option>
                              <option value="Graphic">Graphic Multimedia</option>
                              <option value="Electronic">Electronic & Engineering</option>
                              <option value="Programming">Programming & Application Development</option>
                              <option value="Networking">Computer Networking</option>
                              <!-- Add other courses here -->
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="secondary_school" class="form-label">Secondary School</label>
                          <input type="text" class="form-control" id="secondary_school" name="secondary_school" required>
                      </div>
                      {{-- <button type="submit" class="form_button" onclick="document.getElementById('subscribe').scrollIntoView({ behavior: 'smooth' })"> --}}
                      {{-- <button type="submit" class="form_button">Submit</button> --}}
                      <button type="submit" class="form_button">Submit</button>
                  </form>
              </div>
          </div>
          
          
          
        </div>
      </div>
    </div>
  </div>

  {{-- <div id="video" class="our-videos section">
    <div class="videos-left-dec">
      <img src="assets/images/videos-left-dec.png" alt="">
    </div>
    <div class="videos-right-dec">
      <img src="assets/images/videos-right-dec.png" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-8">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="thumb">
                          <iframe width="100%" height="auto" src="https://www.youtube.com/embed/JynGuQx4a1Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          <div class="overlay-effect">
                            <a href="#"><h4>Project One</h4></a>
                            <span>SEO &amp; Marketing</span>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <iframe width="100%" height="auto" src="https://www.youtube.com/embed/RdJBSFpcO4M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          <div class="overlay-effect">
                            <a href="#"><h4>Second Project</h4></a>
                            <span>Advertising &amp; Marketing</span>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <iframe width="100%" height="auto" src="https://www.youtube.com/embed/ZlfAjbQiL78" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          <div class="overlay-effect">
                            <a href="#"><h4>Project Three</h4></a>
                            <span>Digital &amp; Marketing</span>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <iframe width="100%" height="auto" src="https://www.youtube.com/embed/mx1WseE7-0Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          <div class="overlay-effect">
                            <a href="#"><h4>Fourth Project</h4></a>
                            <span>SEO &amp; Advertising</span>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-4">
                  <div class="menu">
                    <div class="active">
                      <div class="thumb">
                        <img src="assets/images/video-thumb-01.png" alt="">
                        <div class="inner-content">
                          <h4>Project One</h4>
                          <span>SEO &amp; Marketing</span>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <img src="assets/images/video-thumb-02.png" alt="">
                        <div class="inner-content">
                          <h4>Second Project</h4>
                          <span>Advertising &amp; Marketing</span>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <img src="assets/images/video-thumb-03.png" alt="Marketing">
                        <div class="inner-content">
                          <h4>Project Three</h4>
                          <span>Digital &amp; Marketing</span>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <img src="assets/images/video-thumb-04.png" alt="SEO Work">
                        <div class="inner-content">
                          <h4>Fourth Project</h4>
                          <span>SEO &amp; Advertising</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>             
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

  {{-- <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="section-heading">
            <h2>Feel free to <em>Contact</em> us via the <span>HTML form</span></h2>
            <div id="map">
              <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="360px" frameborder="0" style="border:0" allowfullscreen=""></iframe>
            </div>
            <div class="info">
              <span><i class="fa fa-phone"></i> <a href="#">010-020-0340<br>090-080-0760</a></span>
              <span><i class="fa fa-envelope"></i> <a href="#">info@company.com<br>mail@company.com</a></span>
            </div>
          </div>
        </div>
        <div class="col-lg-5 align-self-center">
          <form id="contact" action="" method="get">
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="surname" name="surname" id="surname" placeholder="Surname" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="website" id="website" placeholder="Your Website URL" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-button">Submit Request</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="contact-dec">
      <img src="assets/images/contact-dec.png" alt="">
    </div>
    <div class="contact-left-dec">
      <img src="assets/images/contact-left-dec.png" alt="">
    </div>
  </div>

  <div class="footer-dec">
    <img src="assets/images/footer-dec.png" alt="">
  </div>

  --}}

@endsection