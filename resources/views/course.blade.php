@extends('layout')
@section('content')



<style>
  .banner {
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    padding: 200px 0px 100px 0px;
    position: relative;
    overflow: hidden;
    background-attachment: fixed;
    background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('assets/images/head.jpg');
    width: 100%;
    height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
}

h2 {
    color: white;
    font-weight: 600;
    font-size: 35px;
    text-align: center;
}

/* Course Gallery */
.course-gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 15px;
    padding: 20px;
}

/* Individual Course Column */
.course-column {
    position: relative;
    width: 17%; /* Default size for larger screens */
    max-width: 350px;
    height: 450px;
    overflow: hidden;
    transition: all 0.3s ease;
    cursor: pointer;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.course-column img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

/* Course Description Overlay */
.course-description {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.75);
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
    padding: 20px;
    text-align: left;
}

.course-column p, .course-column h5{
  display: none;
}
.course-column h4{
    margin-top:100%;
    width:100%;
}

.course-column:hover {
    transform: scale(1.05);
}

.course-column:hover img {
    transform: scale(1.1);
}

.course-column:hover .course-description {
    opacity: 1;
}

/* Responsive Adjustments */
@media (max-width: 1024px) {
    .course-column {
        width: 30%;
        height: 400px;
    }
}

@media (max-width: 768px) {
    .course-gallery {
        flex-direction: column;
        align-items: center;
    }

    .course-column {
        width: 90%;
        height: auto;
    }
}

@media (max-width: 480px) {
    .banner {
        height: 300px;
        padding: 150px 0;
    }

    h2 {
        font-size: 28px;
    }

    .course-column {
        width: 95%;
        height: auto;
    }

    .course-description {
        padding: 15px;
    }
}

/* Modal Close Button */
.modal-content {
    position: relative;
    background: white;
    
    padding: 20px;
    border-radius: 10px;
}
.modal-content p{
  color: black !important;
}

.modal .close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 2.5rem;
    color: black;
    background: transparent;
    border: none;
    cursor: pointer;
}

.modal .close:hover {
    color: black;
}
</style>

<div class="test-banner" id="top">
  <div class="banner">
    <h2>OUR COURSES</h2>
  </div>
</div>

<div class="course-gallery">
  <!-- Course Column 1 -->
  <div class="course-column" data-toggle="modal" data-target="#imageModal" data-image="assets/images/1.jpg">
    <img src="assets/images/1.jpg" alt="Course 1">
    <div class="course-description">
      <h4>ACCOUNTING</h4>
      <p style="color: white;" align="justify">The Kolej Synergy Diploma in Accounting is a highly focused and depth professional training qualification designed to prepare students for careers in various concentrations within the specialization of Accounting.</p>
        <br>
      <h5>COURSE MODULES</h5>
    
      <p style="color: white;"><b>SEMESTER 1</b><br>
        ▷ AKS101 Account Payable<br>
        ▷ AKS102 Account Receicable<br>
        ▷ AKS103 Payroll
        <br><br>
        <b> SEMESTER 2</b><br>
        ▷ AKS201 Cash and Bank Transactions<br>
        ▷ AKS202 Property Plant and Equipment Register<br>
        ▷ AKS203 Month End Financial Statement<br>
        <br><br>
        <b>SEMESTER 3</b><br>
        ▷ AKS301 Property ,Plant And Equipment<br>
        ▷ AKS302 Financial Report<br>
        ▷ AKS303 Hire Purchanse<br>
        <br><br>
        <b>SEMESTER 4</b><br>
        ▷ AKS401 Business Entities Reporting<br>
        ▷ AKS402 Costing<br>
        ▷ AKS403 On Job Training<br>
        <br><br>
        <b>SEMESTER 5</b><br>
        ▷ AKS501 Final Year Project<br>
        </p>
    
    </div>
  </div>

  <!-- Course Column 2 -->
  <div class="course-column" data-toggle="modal" data-target="#imageModal" data-image="assets/images/2.jpg">
    <img src="assets/images/2.jpg" alt="Course 2">
    <div class="course-description">
        <h4>GRAPHIC MULTIMEDIA</h4>
        <p style="color: white;" align="justify">The Kolej Synergy Diploma in Graphic Multimedia is a highly focused and depth professional training qualification designed to prepare students for careers in various concentrations within the specialization of digital multimedia.</p>
          <br><br>
        <h5>COURSE MODULES</h5>
        
        <p style="color: white;"><b>SEMESTER 1</b><br>
          ▷ MKS101 PGraphic Interface Production<br>
          ▷ MKS102 Audio & Video Production<br>
          <br><br>
          <b>SEMESTER 2</b><br>
          ▷ MKS201 Interactive Application Development<br>
          ▷ MKS202 Interactive Multimedia Technical Support<br>
          ▷ MKS203 Interactive Multimedia Design Supervision<br>
          <br><br>
          <b>SEMESTER 3</b><br>
          ▷ MKS301 Multimedia Production Management<br>
          ▷ MKS302 Multimedia Instructional Design<br>
          ▷ MKS303 Multimedia Art Directing<br>
          <br><br>
          <b>SEMESTER 4</b><br>
          ▷ MKS401 Multimedia Audio Visual (AV) Directing<br>
          ▷ MKS402 Multimedia Quality Control<br>
          ▷ MKS403 Multimedia Research and Innovation<br>

        <br><br>
        <b>SEMESTER 5</b><br>
        ▷ MKS501 On Job Training<br>
        ▷ MKS502 Final Year Project<br>
    </div>
  </div>

  <!-- Course Column 3 -->
  <div class="course-column" data-toggle="modal" data-target="#imageModal" data-image="assets/images/3.jpg">
    <img src="assets/images/3.jpg" alt="Course 3">
    <div class="course-description">
      <h4>ELECTRONIC & ENGINEERING</h4>
      <p style="color: white;" align="justify">The Kolej Synergy Diploma in Electronics Industrial is a highly focused and depth professional training qualification designed to prepare students for careers in various concentrations within the specialization of Electronics Industries.</p>
          <br><br>
        <h5>COURSE MODULES</h5>
        
        <p style="color: white;"><b>SEMESTER 1</b><br>
          ▷ EKS101 Electronic Schematic Drawing<br>
          ▷ EKS102 Instrument And Test Equipment Setup & Handing<br>
          ▷ EKS103 Industrial Electronic Equipment Installation<br>
          ▷ EKS104 Instrument And Test Equipment Troubleshooting<br>
          ▷ EKS105 Industrial Electronic Equipment Troubleshooting<br>
          <br><br>
          <b>SEMESTER 2</b><br>
          ▷ EKS201 Electronic Product Quality Control<br>
          ▷ EKS202 Programmable Logic Controller (PLC) Configuration<br>
          ▷ EKS203 Electrical & Electronic Principle<br>
          ▷ EKS204 Digital Electronic<br>
          ▷ EKS205 Practice On Electronic Principle<br>
          <br><br>
          <b>SEMESTER 3</b><br>
          ▷ EKS301 Electronic Equipment Precentive Maintenance<br>
          ▷ EKS302 Electronic Equipment Corrective Maintenance<br>
          ▷ EKS303 Electronic Appliance Repair & Maintenance<br>
          ▷ EKS304 Project
          <br><br>
          <b>SEMESTER 4</b><br>
          ▷ EKS401 Electronic Equipment Adminstration<br>
          ▷ EKS402 Electronic Product & Technology Improvement<br>
          ▷ EKS403 Electronic Product Quality Assurance<br>
          ▷ EKS404 Microcontroller Configuration<br>
        <br><br>
        <b>SEMESTER 5</b><br>
        ▷ EKS501 On Job Training<br>
        ▷ EKS502 Final Year Project<br>
    </div>
  </div>

  <!-- Course Column 4 -->
  <div class="course-column" data-toggle="modal" data-target="#imageModal" data-image="assets/images/4.jpg">
    <img src="assets/images/4.jpg" alt="Course 4">
    <div class="course-description">
      <h4>PROGRAMMING & APPLICATION DEVELOPMENT</h4>
      <p style="color: white;" align="justify">The Kolej Synergy Diploma in Application Development & Programmingis a highly focused and depth professional training qualification designed to prepare students for careers in various concentrations within the specialization of Application Development & Programming.</p>
          <br><br>
        <h5>COURSE MODULES</h5>
      
        <p style="color: white;"><b>SEMESTER 1</b><br>
          ▷ PKS101 Application Prototype Development<br>
          ▷ PKS102 Application Module Development<br>
          ▷ PKS103 Application Module Integration<br>
          <br><br>
          <b>SEMESTER 2</b><br>
          ▷ PKS201 Development Environment Deployment<br>
          ▷ PKS202 Application Bug Fixing<br>
          ▷ PKS203 Application System Documentation Compilation<br>
          ▷ PKS204 Application Development Supervision<br>
          <br><br>
          <b>SEMESTER 3</b><br>
          ▷ PKS301 Application Systems Programming<br>
          ▷ PKS302 Application Database Programming<br>
          ▷ PKS303 Application Data Entry Administration<br>
          ▷ PKS304  Application Systems Development Administration<br>
          <br><br>
          <b>SEMESTER 4</b><br>
          ▷ PKS401 Infra Systems Interface Designing<br>
          ▷ PKS402 Application Systems Functional Testingbr>
          ▷ PKS403 Application Systems Technical Support<br>
          ▷ PKS404 On Job Training<br>
        <br><br>
        <b>SEMESTER 5</b><br>
        ▷ PKS501 Final Year Project<br>
    </div>
  </div>

  <!-- Course Column 5 -->
  <div class="course-column" data-toggle="modal" data-target="#imageModal" data-image="assets/images/5.jpg">
    <img src="assets/images/5.jpg" alt="Course 5">
    <div class="course-description">
      <h4>COMPUTER NETWORKING</h4>
      <p style="color: white;" align="justify">The Kolej Synergy Diploma in Computer Networking is a highly focused and in-depth professional training qualification designed to prepare students for careers in various concentrations within the specialization of Computer Networking and Server Management.</p>
          <br><br>
        <h5>COURSE MODULES</h5>
       
        <p style="color: white;"><b>SEMESTER 1</b><br>
          ▷ NKS101 Computer System Installation<br>
          ▷ NKS102 Computer Networking Structured Cabling System Installation<br>
          ▷ NKS103 Computer Networking Equipment Installation<br>
          <br><br>
          <b>SEMESTER 2</b><br>
          ▷ NKS201 Computer Networking Equipment Configuration<br>
          ▷ NKS202 Computer Networking Application Services Configuration<br>
          ▷ NKS203 Computer Networking Security Hardening<br>
          <br><br>
          <b>SEMESTER 3</b><br>
          ▷ NKS301 Server Configuration<br>
          ▷ NKS302 Server Maintenace Adminstration<br>
          ▷ NKS303 Computer Network Security Development<br>
          <br><br>
          <b>SEMESTER 4</b><br>
          ▷ NKS401 Computer Network Maintenace Management<br>
          ▷ NKS402 Computer system And Network Procerementk<br>
          ▷ NKS403 Computer System Maintenance Management<br>
        <br><br>
        <b>SEMESTER 5</b><br>
        ▷ NKS501 On Job Training<br>
        ▷ NKS502 Final Year Project<br>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- Close Button -->
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <img src="" id="modalImage" alt="Enlarged image">
      <div class="modal-body" id="syllabus">
        
        
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
// Handle image click to open modal
$('#imageModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var imageSrc = button.data('image'); // Extract info from data-* attributes
   // Extract info from data-* attributes
  var modal = $(this);
  modal.find('#modalImage').attr('src', imageSrc);
  modal.find("#syllabus").html(syllabus);
});

$(document).on("click",".course-column",function(){
    var syllabus = $(this).find(".course-description").html();
    $('#syllabus').html(syllabus);
});
</script>

@endsection
