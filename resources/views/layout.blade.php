<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .header-area.header-sticky  .colorheader{
          color: yellow;
        }
    </style>

    <title>SYNERGY COLLEGE</title>
</head>
<body>
    @include('header')
    <main>
        @yield('content')
    </main>
    @include('footer')
</body>

 <script>
    let header = document.querySelector('header');
    let main = document.querySelector('main');

    console.log(header,main,header.offsetHeight)

    main.style.marginTop = header.offsetHeight + "px";
 </script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


<!-- Scripts -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/animation.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/custom.js"></script>

<script>
// Acc
  $(document).on("click", ".naccs .menu div", function() {
    var numberIndex = $(this).index();

    if (!$(this).is("active")) {
        $(".naccs .menu div").removeClass("active");
        $(".naccs ul li").removeClass("active");

        $(this).addClass("active");
        $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

        var listItemHeight = $(".naccs ul")
          .find("li:eq(" + numberIndex + ")")
          .innerHeight();
        $(".naccs ul").height(listItemHeight + "px");
      }
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const mainImage = document.querySelector('.main-image');
    const hoverImage = document.querySelector('.hover-image');

    const leftImageContainer = document.querySelector('.left-image');

    leftImageContainer.addEventListener('mouseenter', function() {
      mainImage.style.display = 'none'; // Hide main image
      hoverImage.style.display = 'block'; // Show hover image
    });

    leftImageContainer.addEventListener('mouseleave', function() {
      mainImage.style.display = 'block'; // Show main image
      hoverImage.style.display = 'none'; // Hide hover image
    });
  });
</script>




<script>
  document.addEventListener('DOMContentLoaded', function() {
      const images = document.querySelectorAll('.animated-img');
      const modalImg = document.getElementById('modal');  

      images.forEach(img => {
          img.addEventListener('click', function() {
              const imgSrc = this.getAttribute('data-image');  
              modalImg.src = imgSrc;  
          });
      });
  });
</script>


<script>
document.getElementById('scrollLink').click();
</script>
</html>