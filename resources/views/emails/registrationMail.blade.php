<!-- resources/views/student_registration.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Registration</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .form-container { max-width: 400px; margin: 40px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        label { display: block; margin-top: 15px; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 20px; padding: 10px 20px; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Student Registration Review</h2>
        <p><strong>Student Name:</strong> {{ $data->s_name }}</p>
        <p><strong>Email:</strong> {{ $data->s_email }}</p>
        <p><strong>Phone Number:</strong> {{ $data->h_contact }}</p>
        <a href="https://wa.me/?text=Hello%20Synergy%20Team%2C%20I%20am%20{{ urlencode($data->s_name) }}%20and%20I%20am%20interested%20in%20taking%20up%20the%20{{ urlencode($data->course) }}%20course%20at%20Synergy%20Academy.%20Please%20contact%20me%20at%20{{ urlencode("support@synergycollege.edu.my") }}%20or%20{{ urlencode("012-4081851") }}%20for%20further%20details.%20Thank%20you%20for%20your%20time.%0A%0ARegards%2C%0A College ADMIN" target="_blank">
            Send WhatsApp Message
        </a>
        <p><strong>Course:</strong> {{ $data->course }}</p>
    </div>
</body>
</html>
