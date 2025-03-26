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
  {{-- @dd(json_decode($our_course->content->first()->content)) --}}
  @foreach (json_decode($our_course->content->first()->content) as $item)
  <div class="course-column" data-toggle="modal" data-target="#imageModal" data-image="{{ $item->image }}">
    <img src="{{ $item->image }}" alt="Course 1">
    <div class="course-description">
      
      {!! $item->content !!}
    </div>
  </div>
  @endforeach
  

  
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
