<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include flatpickr CSS and JS in the <head> section -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <title>Appointment Verify</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #18153d;
            display: flex;
            color: white;
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
            height: 1800px;
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
            padding-left: 20px;
            padding-right: 30px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #222;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 30px;
            text-align: center;
        }

        th, td {
            padding: 12px 15px;
        }

        thead {
            background-color: #ea2328;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: white;
        }

        tbody tr:nth-child(odd) {
            background-color: white;
        }

        tbody tr:hover {
            background-color: lightgray;
            cursor: pointer;
        }

        th {
            text-transform: uppercase;
            font-size: 14px;
        }

        td {
            color: black;
        }

        .remind-button {
            background-color: #18153d;
            border: none;
            padding: 10px 15px;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        .remind-button:hover {
            background-color: #ff5722;
        }

        .verify-section {
            margin-top: 20px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            color: black;
        }

        .verify-section input[type="text"] {
            padding: 10px;
            width: 50%;
            border-radius: 5px;
            border: 2px solid black;
        }

        .verify-button {
            background-color: #ea2328;
            border: none;
            padding: 10px 20px;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }

        .verify-button:hover {
            background-color: #ff5722;
        }

        .submit {
            background-color: white;
            border: 1px solid black;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 10px;
            padding-bottom: 10px;
            border-radius: 5px;
            font-weight: 700;
            font-size: 15px;
            color: black;
            margin-top: 60px;
        }

        .submit:hover {
            background-color: black;
            color: white;
            cursor: pointer;
        }


        .logo {
            margin-right:1200px ; /* Pushes the logo to the left */
            position: absolute;
        
        }

        .logo img {
            height: 80px;
        }
        
        h1{
            margin-left: 100px;
            position: relative;
        }

        .details{
            background-color: #ea2328;
            color: white;
            width: 780px;
            height: ;
            border-radius: 50px;
            padding: 20px;
        }
  
    </style>
</head>

<body>
    <body>
        <div class="container">
            <aside class="sidebar">
                
                @foreach ($errors->all() as $error)
                    {{ $error}}
                @endforeach
               
                <h2>ADMIN MENU</h2>
                <ul>
                   
                        <li><a href="/dashboard" <?php echo $_SERVER['REQUEST_URI'] == '/dashboard' ? 'style="color:#ea2328;"' : ''; ?>>DASHBOARD</a></li>
                    </button>
                   
                        <li><a href="/students" <?php echo $_SERVER['REQUEST_URI'] == '/students' ? 'style="color:#ea2328;"' : ''; ?>>STUDENT LISTS</a></li>
                    </button>
                    <li><a href="/notice" <?php echo $_SERVER['REQUEST_URI'] == '/notice' ? 'style="color:#ea2328;"' : ''; ?>>NOTIFICATION</a></li>
                    <li><a href="/appointment" <?php echo $_SERVER['REQUEST_URI'] == '/appointment' ? 'style="color:#ea2328;"' : ''; ?>>APPOINTMENT VERIFY</a></li>
                    <li><a href="/image" <?php echo $_SERVER['REQUEST_URI'] == '/image' ? 'style="color:#ea2328;"' : ''; ?>>UPDATE IMAGE</a></li>
                    <li><a href="/update_new" <?php echo $_SERVER['REQUEST_URI'] == '/update_new' ? 'style="color:#ea2328;"' : ''; ?>>UPDATE CONTACT</a></li>
                    
                </ul>
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="submit">LOG OUT</button>
                </form>
            </aside>
    
            <div class="main-content">
            <header>
                <div class="logo">
                    <a href="/dashboard"><img src="assets/images/school3.png" alt="Logo"></a>
                </div>
                
                <h1>APPOINTMENT VERIFY</h1>
            </header>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Appointment Date</th>
                                <th>Guardian Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $student->full_name }}</td>
                                <td>{{ $student->appointment_date }}</td>
                                <td>{{ $student->email }}</td>
                                <td>
                                    <button class="remind-button" onclick="sendReminder('{{ $student->id }}','{{$student->email}}')">REMIND GUARDIAN</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
    
                <div class="verify-section">
                    <h2>ENTER VERIFICATION NUMBER</h2>
                    <input type="text" id="verificationInput" placeholder="Enter verification number">
                    <button class="verify-button" onclick="verifyCode()">VERIFY</button>
                </div>

                <div id="studentDetails" style="display: none; margin-top: 20px;" class="details">
                    <h2>STUDENT DETAILS</h2>
                    <p><strong>FULL NAME:</strong> <span id="detailFullName"></span></p>
                    <p><strong>I/C NO:</strong> <span id="detailIC"></span></p>
                    <p><strong>GENDER:</strong> <span id="detailGender"></span></p>
                    <p><strong>NATIONALITY:</strong> <span id="detailNationality"></span></p>
                    <p><strong>ADDRESS:</strong> <span id="detailAddress"></span></p>
                    <p><strong>GUARDIAN CONTACT NO:</strong> <span id="detailGuardianContact"></span></p>
                    <p><strong>CONTACT NO:</strong> <span id="detailContact"></span></p>
                    <p><strong>EMAIL:</strong> <span id="detailEmail"></span></p>
                    <p><strong>REGISTRATION DATE:</strong> <span id="detailDate"></span></p>
                    <p><strong>STATUS:</strong> <span id="detailStatus"></span></p>
                </div>

            </div>
        </div>
    

       
        
        <script>
            function sendReminder(student_id,email) {
                fetch('/send-reminder', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ student_id: student_id })
                })
                .then(response => response.json())
                .then(data => {
                    alert('Reminder sent successfully to ' + email);
                })
                .catch(error => {
                    alert('Error sending reminder.');
                });
            }
    
            function verifyCode() {
    const code = document.getElementById('verificationInput').value;

    fetch('/verify-code', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ code: code })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message); // Display success message

            // Fetch the student's details
            fetch(`/get-student-details?code=${code}`, {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(studentData => {
                if (studentData.success) {
                    const student = studentData.student;

                    // Populate student details
                    document.getElementById('detailFullName').textContent = student.full_name;
                    document.getElementById('detailIC').textContent = student.ic_no;
                    document.getElementById('detailGender').textContent = student.gender;
                    document.getElementById('detailNationality').textContent = student.nationality;
                    document.getElementById('detailAddress').textContent = student.address;
                    document.getElementById('detailGuardianContact').textContent = student.guardian_contact_no;
                    document.getElementById('detailContact').textContent = student.contact_no;
                    document.getElementById('detailEmail').textContent = student.email;
                    document.getElementById('detailDate').textContent = student.created_at;
                    document.getElementById('detailStatus').textContent = student.status;

                    // Show the student details section
                    document.getElementById('studentDetails').style.display = 'block';
                } else {
                    alert('Error fetching student details.');
                }
            });
        } else {
            alert(data.message); // Display error message
        }
    })
    .catch(error => {
        alert('Error verifying code. Please check your network connection or try again later.');
        console.error('Error:', error);
    });
}



        </script>
    </body>
            
</body>




</html>
