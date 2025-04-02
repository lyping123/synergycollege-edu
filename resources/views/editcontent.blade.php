<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    
</head>

<style>
    /* Your existing styles */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #18153d;
        display: flex;
        color: black;
        height: auto;
    }

    .container {
        display: flex;
        width: 100%;
    }

    .sidebar {
        width: 110px;
        background: white;
        color: black;
        padding-left: 30px;
        padding-right: 30px;
        padding-top: 10px;
        height: 320vh;
    }

    .sidebar h2 {
        text-align: center;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
        text-align: center;
    }

    .sidebar ul li {
        margin: 20px 0;
    }

    .sidebar ul li a {
        color: black;
        text-decoration: none;
    }

    .sidebar ul li a:hover {
        color: #ea2328;
    }

    .main-content {
        flex: 1;
        padding: 20px;

    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    h1 {
        margin-left: 100px;
    }
    .table-container {
        width: 100%;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    /* Input Fields */
    input[type="text"],
    textarea,
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        margin: 10px 0px;
    }

    /* Textarea */
    textarea {
        height: 100px;
        resize: vertical;
    }

    /* File Upload */
    input[type="file"] {
        border: none;
        padding: 5px;
    }

    /* Image Preview */
    img {
        margin-top: 10px;
        max-width: 100px;
        border-radius: 5px;
    }

    /* Button Styling */
    button {
        background-color: #ea2328;
        color: white;
        padding: 12px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        transition: 0.3s;
    }

    button:hover {
        background-color: #c61f23;
    }

    .point-form-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .point-form-item {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 15px;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .point-form-item p {
        margin: 0;
        flex: 1;
        min-width: 200px;
    }

    .hidden-file-input {
        display: none; /* Hide the file input */
    }

    .image-wrapper {
        flex: 0 0 auto;
    }

    .image-preview {
        margin-top: 10px;
    }

    .clickable-image {
        cursor: pointer;
        transition: opacity 0.3s;
    }

    .clickable-image:hover {
        opacity: 0.8;
    }

    .image-placeholder {
        display: inline-block;
        padding: 10px;
        background-color: #f0f0f0;
        border: 1px dashed #ccc;
    }
    .add-point-btn {
        margin-top: 10px;
        padding: 8px 16px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .add-point-btn:hover {
        background-color: #0056b3;
    }

    @media (max-width: 768px) {
        .point-form-item {
            flex-direction: column;
            align-items: flex-start;
        }
    }

    @media (max-width: 768px) {
        .point-form-item {
            flex-direction: column; /* Stack items vertically on small screens */
            align-items: flex-start;
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .main-content {
            width: 90%;
        }
    }
   

</style>

<body>
    <div class="container">
        <aside class="sidebar">
            <h2>ADMIN MENU</h2>
            <ul>
                <li><a href="/dashboard" <?php echo $_SERVER['REQUEST_URI'] == '/dashboard' ? 'style="color:#ea2328;"' : ''; ?>>DASHBOARD</a></li>
                <li><a href="/modifycontentPage" <?php echo $_SERVER['REQUEST_URI'] == '/modifycontentPage' ? 'style="color:#ea2328;"' : ''; ?>>MODIFY CONTENT</a></li>
                <li><a href="/eventPage" <?php echo $_SERVER['REQUEST_URI'] == '/event' ? 'style="color:#ea2328;"' : ''; ?>>UPDATE EVENT</a></li>
                <li><a href="/image" <?php echo $_SERVER['REQUEST_URI'] == '/image' ? 'style="color:#ea2328;"' : ''; ?>>UPDATE IMAGE</a></li>
                
                
            </ul>
            </ul>

            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
            
                <button type="submit" id="logout" style="margin-top: 60px;" class="submit">LOG OUT</button>
           
            </form>
        </aside>

        <div class="main-content">
            <div class="table-container">
                <h2>{{ $section->section }}</h2>
                <form action="{{ route('updatecontent', $content->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{-- <input type="hidden" name="section_id" value="{{ $section->id }}"> --}}

                    <div id="content-fields">
                        @if($content->content_type == 'short_content')
                            @foreach (json_decode($content->content) as $key => $item)
                                <label>{{ $key }} :</label>
                                @if (strlen($item)>200)
                                    <textarea name="{{ $key }}" class="form-control">{{ $item }}</textarea>
                                @else
                                    <input type="text" name="{{ $key }}" value="{{ $item ?? '' }}" class="form-control">
                                @endif

                            @endforeach
                            {{-- <input type="text" name="content" value="{{ json_decode($section->content)->paragraph ?? '' }}" class="form-control"> --}}
                        
                        @elseif($content->content_type == 'long_content')
                            @foreach (json_decode($content->content) as $key=>$item)
                                <label for="content">long content</label>
                                <textarea name="{{ $key }}"  rows="30" cols="50" style="height: 300px" class="form-control">{{ $item ?? '' }}</textarea>
                            @endforeach
                            
        
                        @elseif($content->content_type == 'pointform_content')
                            <label for="content">Point Form Content:</label> <button type="button" onclick="addPoint()" class="btn btn-success">Add Point</button>
                            <div id="content-fields">
                                @foreach (json_decode($content->content)->paragraph as $key=>$item)
                                    <input type="text" name="content[]" value="{{ $item ?? '' }}" class="form-control" />
                                @endforeach
                            </div>
        
                        @elseif($content->content_type == 'imagepointform_content')
                        <label for="image">Image Point Form Content:</label>
                        <div class="point-form-container">
                            @php
                                $decodedContent = json_decode($content->content);
                            @endphp
                           @foreach ($decodedContent as $index => $item)
                           <div class="point-form-item">
                               <input type="text" name="paragraph[]"  value="{{ $item->paragraph }}"  >    

                               <input type="file" name="image{{ $index }}" class="form-control" accept="image/*">
               
                               <div class="image-wrapper">
                                    @if (isset($item->img))
                                        <img src="{{ asset($item->img) }}" alt="Point {{ $index + 1 }}" width="100" class="clickable-image" data-input-id="file-input-{{$index}}">
                                    @else
                                        <span class="image-placeholder clickable-image" data-input-id="file-input-{{$index}}">No image uploaded yet</span>
                                    @endif
                                </div>
                           </div>
                       @endforeach
                        </div>
                            
                        @elseif($content->content_type == 'imagepointtitleform_content')
                            @php
                                $contentData = json_decode($content->content);
                            @endphp
                            <div class="imagetitleparagraph_content">
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ $contentData->title }}" required>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="paragraph">Paragraph:</label>
                                    <textarea name="paragraph" id="paragraph" class="form-control" rows="5" required>{{ $contentData->paragraph }}</textarea>
                                    @error('paragraph')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <div class="image-preview">
                                        @if ($contentData->img)
                                            <img src="{{ asset($contentData->img) }}" alt="Current Image" width="150" class="clickable-image" id="image-preview">
                                        @else
                                            <span class="image-placeholder" id="image-preview">No image uploaded yet</span>
                                        @endif
                                    </div>
                                    <input type="file" name="image" id="image-input" class="form-control hidden-file-input" accept="image/*">
                                    <small class="form-text text-muted">Click the image to upload a new one. Leave blank to keep the current image.</small>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        @elseif($content->content_type == 'mulimagepointtitleform_content')
                        <div class="imagetitleparagraph_content">
                            @foreach (json_decode($content->content) as $index=>$value)
                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <div class="image-preview">
                                        @if ($value->img)
                                            <img src="{{ asset($value->img) }}" alt="Current Image"  width="150" class="clickable-image" id="image-preview">
                                        @else
                                            <span class="image-placeholder" id="image-preview">No image uploaded yet</span>
                                        @endif
                                    </div>
                                    <input type="file" name="image" id="image-input" class="form-control hidden-file-input" accept="image/*">
                                    {{-- <small class="form-text text-muted">Click the image to upload a new one. Leave blank to keep the current image.</small> --}}
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" name="title[]" id="title" class="form-control" value="{{ $value->title }}" required>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Paragraph:</label>
                                    <input type="text" name="paragraph[]" id="paragraph" class="form-control" value="{{ $value->paragraph }}" required>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                        @elseif($content->content_type == 'imageform_content')
                            @foreach (json_decode($content->content) as $index=>$item)
                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <div class="image-preview">
                                        @if ($item->img)
                                            <img src="{{ asset($item->img) }}" alt="Current Image"   width="300" data-input="image-input-{{ $index }}"   class="clickable-image" id="image-preview">
                                        @else
                                            <span class="image-placeholder" id="image-preview">No image uploaded yet</span>
                                        @endif
                                    </div>
                                    <input type="file" name="image{{ $index }}" id="image-input-{{ $index }}"  class="form-control hidden-file-input" accept="image/*">
                                    {{-- <small class="form-text text-muted">Click the image to upload a new one. Leave blank to keep the current image.</small> --}}
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" name="title[]" id="title" class="form-control" value="{{ $item->content }}" required>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                            @endforeach
                        @elseif($content->content_type == 'pdfform_content')
                            <div class="form-group">
                                <label for="pdf">refund policy:</label><br>
                                <input type="file" name="refund_policy"  class="form-control" accept="pdf/*">
                            </div>
                            <div class="form-group">
                                <label for="pdf">Student Handbook:</label><br>
                                <input type="file" name="student_handbook"  class="form-control" accept="pdf/*">
                            </div>
                        @elseif($content->content_type == 'html_content')
                            @php
                                $section=json_decode($content->content,true) ?? [];
                                
                                $html_content=$section[$course]["content"]?? '';
                            @endphp
                            <input type="text" name="course" value="{{ $course }}"  readonly/>
                            
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <div class="image-preview">
                                    @if ($section[$course]["image"])
                                        <img src="{{ asset($section[$course]["image"]) }}" alt="Current Image" data-input="image-input-0"  width="150" class="clickable-image" id="image-preview">
                                    @else
                                        <span class="image-placeholder"  id="image-preview">No image uploaded yet</span>
                                    @endif
                                </div>
                                <input type="file" name="image" id="image-input-0" class="form-control hidden-file-input" accept="image/*">
                                {{-- <small class="form-text text-muted">Click the image to upload a new one. Leave blank to keep the current image.</small> --}}
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">HTML Content:</label>
                                <textarea name="content" id="editor" class="form-control">{{ $html_content?? '' }}</textarea>
                            </div>
                        @elseif($content->content_type == 'directory_content')
                        @foreach (json_decode($content->content) as $index=>$value)
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <div class="image-preview">
                                    @if ($value->img)
                                        <img src="{{ asset($value->img) }}" alt="Current Image"  width="150" class="clickable-image" id="image-preview">
                                    @else
                                        <span class="image-placeholder" id="image-preview">No image uploaded yet</span>
                                    @endif
                                </div>
                                <input type="file" name="image" id="image-input" class="form-control hidden-file-input" accept="image/*">
                                {{-- <small class="form-text text-muted">Click the image to upload a new one. Leave blank to keep the current image.</small> --}}
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Name:</label>
                                <input type="text" name="name[]" id="name" class="form-control" value="{{ $value->name }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">position:</label>
                                <input type="text" name="position[]" id="position" class="form-control" value="{{ $value->position }}" required>
                                @error('position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">phone number:</label>
                                <input type="text" name="phone[]" id="phone" class="form-control" value="{{ $value->phone }}" required>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">email:</label>
                                <input type="text" name="email[]" id="email" class="form-control" value="{{ $value->email }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @endforeach
                        @endif
                    </div>
        
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
<!-- Rich Text Editor -->

<script>
    function addPoint() {
        var point = '<input type="text" name="content[]" class="form-control" />';
        document.getElementById('content-fields').innerHTML+=point;
    }
    document.querySelectorAll('.clickable-image').forEach(function(element) {
        element.addEventListener('click', function() {
            const inputId = this.getAttribute('data-input-id');
            document.getElementById(inputId).click();
        });
    });

    // Optional: Update image preview after file selection
    document.querySelectorAll('.hidden-file-input').forEach(function(input) {
        input.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgElement = input.parentElement.querySelector('.clickable-image');
                    if (imgElement.tagName === 'IMG') {
                        imgElement.src = e.target.result; // Update existing image
                    } else {
                        // Replace placeholder with new image
                        const newImg = document.createElement('img');
                        newImg.src = e.target.result;
                        newImg.width = 100;
                        newImg.className = 'clickable-image';
                        newImg.setAttribute('data-input-id', input.id);
                        imgElement.replaceWith(newImg);
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    });

    // Dynamically add more point-form items
    
    document.querySelectorAll('.clickable-image, .image-placeholder').forEach(function(preview) {
        preview.addEventListener('click', function() {
            const inputId = this.getAttribute('data-input');
            document.getElementById(inputId).click();
        });
    });

    // Update preview when a new file is selected for any input
    document.querySelectorAll('.hidden-file-input').forEach(function(input) {
        input.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    c
                    const preview = document.querySelector(`[data-input="${input.id}"]`);
                    
                    if (preview.tagName === 'IMG') {
                        preview.src = e.target.result;
                    } else {
                        const newImg = document.createElement('img');
                        newImg.src = e.target.result;
                        newImg.width = 150;
                        newImg.className = 'clickable-image';
                        newImg.setAttribute('data-input', input.id);
                        preview.replaceWith(newImg);
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    });
    
</script>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
    
</script>
</body>
</html>
