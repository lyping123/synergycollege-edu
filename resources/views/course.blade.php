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
  }

  .course-gallery {
    display: flex;
    width: 100vw;
    height: 100%;
    gap: 2px;
  }

  .course-column {
    position: relative;
    width: 20vw;
    height: 200vh;
    overflow: hidden;
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .course-column img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .course-description {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: left;
    align-items: left;
    opacity: 0;
    transition: opacity 0.3s ease;
    padding: 70px;
    text-align: left;
  }

  .course-column:hover {
    width: 100vw;
    z-index: 1;
  }
  
  .course-column:hover img {
    transform: scale(1.1);
  }

  .course-column:hover .course-description {
    opacity: 1;
  }

  .course-gallery:hover .course-column:not(:hover) {
    opacity: 0.1;
  }

  /* Style for modal close button */
  .modal-content {
    position: relative;
  }

  .modal .close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 2.5rem;
    color: #fff;
    background: transparent;
    border: none;
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
      <p style="color: white;">The Kolej Synergy Diploma in Accounting is a highly focused and depth professional training qualification designed to prepare students for careers in various concentrations within the specialization of Accounting.</p>
        <br>
      <h5>COURSE MODULES</h5>
    
      <p style="color: white;"><b>SEMESTER 1</b><br>
        ▷ AKS101 Account Payable<br>
        ▷ AKS102 Account Receicable<br>
        ▷ AKS103 Payroll
        <br><br>
        <b> SEMESTER 2</b><br>
        ▷ AKS201 Cash and Bank Transactions<br>
        ▷ AKS202 Property Plant and Equipment (PPE)<br>
        ▷ AKS203 Month End Financial Statement<br>
        <br><br>
        <b>SEMESTER 3</b><br>
        ▷ AKS301 Property ,Plant And Equipment (PPE)<br>
        ▷ AKS302 Financial Report<br>
        ▷ AKS303 Hire Purchanse (HP)<br>
        <br><br>
        <b>SEMESTER 4</b><br>
        ▷ AKS401 Business Entities Reporting<br>
        ▷ AKS402 Product Costing<br>
        ▷ AKS403 On - Job Training<br>
        ▷ AKS404 Final Year Project</p>
    
    </div>
  </div>

  <!-- Course Column 2 -->
  <div class="course-column" data-toggle="modal" data-target="#imageModal" data-image="assets/images/2.jpg">
    <img src="assets/images/2.jpg" alt="Course 2">
    <div class="course-description">
        <h4>GRAPHIC MULTIMEDIA</h4>
        <p style="color: white;">The Kolej Synergy Diploma in Graphic Multimedia is a highly focused and depth professional training qualification designed to prepare students for careers in various concentrations within the specialization of digital multimedia.</p>
          <br><br>
        <h5>COURSE MODULES</h5>
        
        <p style="color: white;"><b>SEMESTER 1</b><br>
          ▷ MKS101 Pre-Production<br>
          ▷ MKS102 2D Animation<br>
          ▷ MKS103 3D Modeling<br>
          ▷ MKS104 3D Animation<br>
          ▷ MKS105 Stroage Animation Work
          <br><br>
          <b>SEMESTER 2</b><br>
          ▷ MKS201 Maintain Workstations<br>
          ▷ MKS202 Staff Appraisal<br>
          ▷ MKS203 House Training<br>
          ▷ MKS204 Costing<br>
          ▷ MKS205 Inventory Management
          <br><br>
          <b>SEMESTER 3</b><br>
          ▷ MKS301 Project Proposal<br>
          ▷ MKS302 Project Report<br>
          ▷ MKS303 Multimedia Product<br>
          ▷ MKS303 Multimedia Presentation<br>
          ▷ MKS303 Multimedia Production Management<br>
          <br><br>
          <b>SEMESTER 4</b><br>
          ▷ MKS401 Multimedia Instructional Design<br>
          ▷ MKS402 Multimedia Art Drawing<br>
          ▷ MKS403 Multimedia Audio Visual (Av) Direction<br>
          ▷ MKS404 Multimedia Quality Control
        <br><br>
        <b>SEMESTER 5</b><br>
        ▷ MKS501 Final Project<br>
        ▷ MKS502 On Job Training<br>
    </div>
  </div>

  <!-- Course Column 3 -->
  <div class="course-column" data-toggle="modal" data-target="#imageModal" data-image="assets/images/3.jpg">
    <img src="assets/images/3.jpg" alt="Course 3">
    <div class="course-description">
      <h4>ELECTRONIC & ENGINEERING</h4>
      <p style="color: white;">The Kolej Synergy Diploma in Electronics Industrial is a highly focused and depth professional training qualification designed to prepare students for careers in various concentrations within the specialization of Electronics Industries.</p>
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
        ▷ EKS501 Final Year Project<br>
        ▷ EKS502 On - Job Training<br>
    </div>
  </div>

  <!-- Course Column 4 -->
  <div class="course-column" data-toggle="modal" data-target="#imageModal" data-image="assets/images/4.jpg">
    <img src="assets/images/4.jpg" alt="Course 4">
    <div class="course-description">
      <h4>PROGRAMMING & APPLICATION DEVELOPMENT</h4>
      <p style="color: white;">The Kolej Synergy Diploma in Application Development & Programmingis a highly focused and depth professional training qualification designed to prepare students for careers in various concentrations within the specialization of Application Development & Programming.</p>
          <br><br>
        <h5>COURSE MODULES</h5>
      
        <p style="color: white;"><b>SEMESTER 1</b><br>
          ▷ PKS101 System Specification<br>
          ▷ PKS102 Requirement Analysis<br>
          ▷ PKS103 Database Development<br>
          ▷ PKS104 Application Development<br>
          ▷ PKS105 System Testing<br>
          ▷ PKS106 Program Documentation Management<br>
          ▷ PKS107 Data Management And Security<br>
          <br><br>
          <b>SEMESTER 2</b><br>
          ▷ PKS201 Risk Management<br>
          ▷ PKS202 Design Concept<br>
          ▷ PKS203 Program Development<br>
          ▷ PKS204 Sql Service<br>
          ▷ PKS205 Web Development<br>
          ▷ PKS206 Testing Methodologies<br>
          ▷ PKS207 Documentation Management<br>
          <br><br>
          <b>SEMESTER 3</b><br>
          ▷ PKS301 Network Security<br>
          ▷ PKS302 Data Stroage Management<br>
          ▷ PKS303 Supervisory Function<br>
          ▷ PKS304 Application System Programming<br>
          ▷ PKS305 Application Database Programming<br>
          ▷ PKS306 Application Data Entry Adminstration<br>
          <br><br>
          <b>SEMESTER 4</b><br>
          ▷ PKS401 Application System Development Adminstration<br>
          ▷ PKS402 Infra System Interface Designing<br>
          ▷ PKS403 Application System Functional Testing<br>
          ▷ PKS404 Application System Technical Support<br>
        <br><br>
        <b>SEMESTER 5</b><br>
        ▷ PKS501 Final Project<br>
        ▷ PKS502 On - Job Training<br>
    </div>
  </div>

  <!-- Course Column 5 -->
  <div class="course-column" data-toggle="modal" data-target="#imageModal" data-image="assets/images/5.jpg">
    <img src="assets/images/5.jpg" alt="Course 5">
    <div class="course-description">
      <h4>COMPUTER NETWORKING</h4>
      <p style="color: white;">The Kolej Synergy Diploma in Computer Networking is a highly focused and in-depth professional training qualification designed to prepare students for careers in various concentrations within the specialization of Computer Networking and Server Management.</p>
          <br><br>
        <h5>COURSE MODULES</h5>
       
        <p style="color: white;"><b>SEMESTER 1</b><br>
          ▷ NKS101 Computer System Set-up<br>
          ▷ NKS102 Server Installation<br>
          ▷ NKS103 Network Cable<br>
          <br><br>
          <b>SEMESTER 2</b><br>
          ▷ NKS201 Computer Network Set-up<br>
          ▷ NKS202 Computer Network Maintenace<br>
          ▷ NKS203 Moblie Device Configuration<br>
          <br><br>
          <b>SEMESTER 3</b><br>
          ▷ NKS301 Server Configuration<br>
          ▷ NKS302 Server Maintenace Adminstration<br>
          ▷ NKS303 Computer Network Security Development<br>
          <br><br>
          <b>SEMESTER 4</b><br>
          ▷ NKS401 Computer Network Maintenace Management<br>
          ▷ NKS402 Computer system And Network Procerementk<br>
          ▷ NKS403 Practical Traing (OJT)<br>
        <br><br>
        <b>SEMESTER 5</b><br>
        ▷ NKS501 Final Project<br>
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
  var modal = $(this);
  modal.find('#modalImage').attr('src', imageSrc);
});
</script>

@endsection
