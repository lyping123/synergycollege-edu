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
  background: #dddddd;
  padding: 80px;
}

.image-container {
    position: relative;
    margin-bottom: 20px;
    overflow: hidden;
    border-radius: 10px;
    cursor: pointer;
}

.image-container img {
    transition: transform 0.3s ease;
}


.image-container :hover {
  transform: scale(1.5);
}



/* Modal Image Styling */
.modal-body img {
    max-width: 100%;       /* Ensures image scales within modal */
    max-height: 80vh;      /* Limits the height to 80% of the viewport */
    object-fit: contain;   /* Ensures the image is fully contained within the modal */
    margin: 0 auto;        /* Centers the image horizontally */
    display: block;        /* Ensures block-level behavior for centering */
}

/* Optional: you can tweak modal size if you want it larger by default */
.modal-dialog {
    max-width: 90%;         /* Increases the width of the modal */
    width: 80%;             /* Adjust as needed */
}






</style>



<div class="test-banner" id="top">
  <div class="banner">
    <h2>WHAT OUR STUDENTS SAY</h2>
  </div>
  
</div>



<div class="container-1 mt-5">

  <!-- First Row -->
  <div class="row">
      @foreach (json_decode($what_student_say->content->content)->testimonials as $item)
        <div class="col-12 col-md-4">
                <div class="image-container">
                    <img src="{{ $item->image }}" class="img-fluid rounded shadow-sm" alt="{{ $item->image }}" onclick="openModal('{{ $item->image }}')">
                </div>
        </div>
      @endforeach
      
  </div>

  <!-- Second Row -->
  {{-- <div class="row">
      <div class="col-12 col-md-4">
          <div class="image-container">
              <img src="assets/images/talknew4.jpg" class="img-fluid rounded shadow-sm" alt="Talk 4" onclick="openModal('assets/images/talknew4.jpg')">
          </div>
      </div>
      <div class="col-12 col-md-4">
          <div class="image-container">
              <img src="assets/images/talknew5.jpg" class="img-fluid rounded shadow-sm" alt="Talk 5" onclick="openModal('assets/images/talknew5.jpg')">
          </div>
      </div>
      <div class="col-12 col-md-4">
          <div class="image-container">
              <img src="assets/images/talknew6.jpg" class="img-fluid rounded shadow-sm" alt="Talk 6" onclick="openModal('assets/images/talknew6.jpg')">
          </div>
      </div>
  </div> --}}

</div>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-body">
              <img id="modalImage" src="" class="img-fluid" alt="Large View">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>


<script>
  function openModal(imageUrl) {
    document.getElementById("modalImage").src = imageUrl;
    var myModal = new bootstrap.Modal(document.getElementById('imageModal'), {});
    myModal.show();
}

</script>



@endsection









