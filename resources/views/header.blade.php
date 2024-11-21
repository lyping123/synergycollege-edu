
  
<!--

TemplateMo 565 Onix Digital

https://templatemo.com/tm-565-onix-digital

-->

  <!-- ***** Preloader Start ***** -->
  {{-- <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div> --}}
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  {{-- <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="/index" class="logo">
              <img src="assets/images/school4.png">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">HOME</a></li>
              <li class="scroll-to-section"><a href="#services">REGISTRATION</a></li>
              <li class="scroll-to-section"><a href="#about">TESTIMONIAL</a></li>
              <li class="scroll-to-section"><a href="#portfolio">COURSES</a></li>
              <li class="scroll-to-section"><a href="#video">OUR SERVICES</a></li> 
              <li class="scroll-to-section"><a href="#contact">DIRECTORY</a></li> 
              <li class="scroll-to-section"><a href="#contact">CARRER</a></li> 
              <li class="scroll-to-section"><div class="main-red-button-hover"><a href="#contact">CONTACT US</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header> --}}
  <!-- ***** Header Area End ***** -->
  <style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    
}

.header {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #ffffff;
    padding: 10px 250px;
    border-bottom: 1px solid #ddd;
    height: 90px;
    
}

.logo {
    margin-right:1200px ; /* Pushes the logo to the left */
    position: absolute;
   
}

.logo img {
    height: 80px;
}

nav ul {
    list-style-type: none;
    display: flex;
    gap: 30px;
}

nav ul li a {
    text-decoration: none;
    color: #000;
    font-weight: bold;
    font-size: 14px;
    text-transform: uppercase; /* Make text uppercase */
    transition: color 0.3s;
}

nav ul li a:hover {
    color: red;
}

/* Responsive Design */
@media (max-width: 768px) {
    .header {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    nav ul {
        flex-direction: column;
        gap: 10px;
        
    }

    .logo img {
        height: 40px;
    }
}

  </style>


 <div class="header">
        <div class="logo">
          <a href="/index"><img src="assets/images/school3.png" alt="Logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="/index" <?php echo $_SERVER['REQUEST_URI'] == '/index' ? 'style="color:#ea2328;"' : ''; ?>>Home</a></li>
                <li><a href="#subscribe" id="student-registration-link">Student Registration</a></li>
                <li><a href="/testimonial" <?php echo $_SERVER['REQUEST_URI'] == '/testimonial' ? 'style="color:#ea2328;"' : ''; ?>>Testimonial</a></li>
                <li><a href="/course" <?php echo $_SERVER['REQUEST_URI'] == '/course' ? 'style="color:#ea2328;"' : ''; ?>>Courses</a></li>
                <li><a href="/service" <?php echo $_SERVER['REQUEST_URI'] == '/service' ? 'style="color:#ea2328;"' : ''; ?>>Our Services</a></li>
                <li><a href="/directory" <?php echo $_SERVER['REQUEST_URI'] == '/directory' ? 'style="color:#ea2328;"' : ''; ?>>Directory</a></li>
                <li><a href="/contact" <?php echo $_SERVER['REQUEST_URI'] == '/contact' ? 'style="color:#ea2328;"' : ''; ?>>Contact</a></li>
            </ul>
        </nav>
    </div>

    <script>
      // Wait for the DOM to fully load
      document.addEventListener('DOMContentLoaded', function() {
        // Get the current section in the URL (e.g., after the # symbol)
        var currentSection = window.location.hash;
    
        // Get the link element
        var link = document.getElementById('student-registration-link');
    
        // Check if the current section matches the #subscribe anchor
        if (currentSection === '#subscribe') {
          // Apply an active class or inline style to highlight the active link
          link.style.color = '#ea2328';  // Change color for active link
        }
    
        // Optionally, you can listen for hash changes if navigating between sections
        window.addEventListener('hashchange', function() {
          if (window.location.hash === '#subscribe') {
            link.style.color = '#ea2328';  // Highlight the active link
          } else {
            link.style.color = '';  // Reset color if not active
          }
        });
      });
    </script>