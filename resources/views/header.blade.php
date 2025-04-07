
  
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
        justify-content: space-between;
        background-color: #ffffff;
        padding: 10px 20px;
        border-bottom: 1px solid #ddd;
        height: 70px;
        position: relative;
        z-index: 1000;

    }
    
    .logo img {
        height: 60px;
    }
    
    nav {
        display: flex;
        align-items: center;
    }
    
    /* Desktop Menu */
    nav ul {
        list-style-type: none;
        display: flex;
        gap: 20px;
    }
    
    nav ul li a {
        text-decoration: none;
        color: #000;
        font-weight: bold;
        font-size: 14px;
        text-transform: uppercase;
        transition: color 0.3s;
    }
    
    nav ul li a:hover {
        color: red;
    }
    
    /* Hamburger Menu for Mobile */
    .menu-toggle {
        display: none;
        font-size: 28px;
        cursor: pointer;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .header {
            flex-direction: row;
            justify-content: space-between;
            padding: 10px;
            height: auto;
        }
    
        .logo {
            margin: 0 auto; /* Center logo */
        }
    
        .logo img {
            height: 50px;
        }
    
        .menu-toggle {
            display: block;
            position: absolute;
            right: 20px;
            top: 20px;
        }
    
        nav ul {
            display: none;
            flex-direction: column;
            gap: 10px;
            position: absolute;
            top: 70px;
            right: 10px;
            background: white;
            width: 100%;
            text-align: center;
            padding: 15px;
            border: 1px solid #ddd;
        }
    
        nav ul.show {
            display: flex;
            
        }
    }
    </style>
    
    <div class="header">
      <div class="logo">
          <a href="/"><img src="assets/images/school3.png" alt="Logo"></a>
      </div>
        {{-- <nav class="navbar navbar-expand-lg navbar-light bg-faded ">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
              <li class="nav-item px-lg-2">
                <a class="nav-link " href="/index">Synergy College</a>
              </li>
              <li class="nav-item px-lg-2">
                <a class="nav-link " href="#subscribe">Student Registration</a>
              </li>
              <li class="nav-item px-lg-2">
                <a class="nav-link " href="/testimonial">Testimonial</a>
              </li>
              <li class="nav-item px-lg-2">
                <a class="nav-link " href="/course">Courses</a>
              </li>
              <li class="nav-item px-lg-2">
                <a class="nav-link " href="/service">Our Services</a>
              </li>
              <li class="nav-item px-lg-2">
                <a class="nav-link " href="/directory">Directory</a>
              </li>
              <li class="nav-item px-lg-2">
                <a class="nav-link " href="/contact">Contact</a>
              </li>
          </ul>
        </div>
        </nav> --}}
        <div class="menu-toggle">&#9776;</div> <!-- Hamburger Icon -->

        <nav style="display: block">
            <ul id="nav-menu">
                <li><a href="/">Home</a></li>
                <li><a href="/#subscribe">Student Registration</a></li>
                <li><a href="/testimonial">Testimonial</a></li>
                <li><a href="/course">Courses</a></li>
                <li><a href="/service">Our Services</a></li>
                <li><a href="/directory">Directory</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/careerForm">Career</a></li>
            </ul>
        </nav>
    </div>
   
    

    <script>
      document.addEventListener("DOMContentLoaded", () => {
          const menuToggle = document.querySelector(".menu-toggle");
          const navMenu = document.getElementById("nav-menu");

          if (menuToggle && navMenu) {
              menuToggle.addEventListener("click", function () {
                
                  navMenu.classList.toggle("show");
              });
          } else {
              console.error("Error: .menu-toggle or #nav-menu not found in the DOM.");
          }
      });
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