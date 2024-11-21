<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Information</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMp5WjQU7r3aUQXJ71vYy/sT1eL0mg4CkgkS6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #18153d;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto;
            margin: 30px;
        }
        .form-container {
            background-color: #e0ffff;
            color: #18153d;
            padding: 40px;
            width: 90%;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            
        }
        h2 {
            text-align: center;
            color: #ea2328;
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin: 15px 0 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ea2328;
            border-radius: 5px;
            background-color: white;
            color: #18153d;
            box-sizing: border-box;
        }
        input[type="text"]:focus {
            outline: none;
            border-color: #18153d;
            background-color: #f8f8ff;
        }
        .btn-success {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #ea2328;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }
        .btn-success:hover {
            background-color: #c91f24;
        }
        .btn-success:active {
            transform: scale(0.98);
        }

        /* Style for the alert box at the top of the page */
        .alert-container {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
            width: 100%;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>



    <div class="form-container">
        <h2>EDIT STUDENT'S INFORMATION</h2>
        <form action="{{ route('student.update', $student->id) }}" method="POST" onsubmit="return confirm('UPDATE SUCCESSFULLY!');">
            @csrf
            @method('PUT')

            <label>FULL NAME</label>
            <input type="text" name="full_name" value="{{ old('full_name', $student->full_name) }}" required>

            <label>I/C NO</label>
            <input type="text" name="ic_no" value="{{ old('ic_no', $student->ic_no) }}" required>

            <label>NATIONALITY</label>
            <input type="text" name="nationality" value="{{ old('nationality', $student->nationality) }}" required>

            <label>GENDER</label>
            <input type="text" name="gender" value="{{ old('gender', $student->gender) }}" required>

            <label>RACE</label>
            <input type="text" name="race" value="{{ old('race', $student->race) }}" required>

            <label>MARITAL STATUS</label>
            <input type="text" name="marital_status" value="{{ old('marital_status', $student->marital_status) }}" required>

            <label>ADDRESS</label>
            <input type="text" name="address" value="{{ old('address', $student->address) }}" required>

            <label>POSTCODE</label>
            <input type="text" name="postcode" value="{{ old('postcode', $student->postcode) }}" required>

            <label>STATE</label>
            <input type="text" name="state" value="{{ old('state', $student->state) }}" required>

            <label>CONTACT NUMBER</label>
            <input type="text" name="contact_no" value="{{ old('contact_no', $student->contact_no) }}" required>

            <label>GUARDIAN CONTACT NUMBER</label>
            <input type="text" name="guardian_contact_no" value="{{ old('guardian_contact_no', $student->guardian_contact_no) }}" required>

            <label>EMAIL</label>
            <input type="text" name="email" value="{{ old('email', $student->email) }}" required>

            <label>COURSE</label>
            <input type="text" name="course" value="{{ old('course', $student->course) }}" required>

            <label>SECONDARY SCHOOL</label>
            <input type="text" name="secondary_school" value="{{ old('secondary_school', $student->secondary_school) }}" required>

            <!-- Submit Button -->
            <button type="submit" class="btn-success">UPDATE STUDENT</button>

        </form>
    </div>

 

</body>
</html>
