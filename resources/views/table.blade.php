<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard</title>
    
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMp5WjQU7r3aUQXJ71vYy/sT1eL0mg4CkgkS6" crossorigin="anonymous">
</head>

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
    width: 250px;
    background: white;
    color: black;
    padding-left: 30px;
    padding-right: 30px;
    padding-top: 30px;
    height: 150vh;
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

h2 {
    margin-top: 0;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 10px;
    text-align: center;
    border: 1px solid white;
    
}
th {
    background-color: lightcyan;
    color: black;
}

button {
    padding: 5px 10px;
    background-color: #ea2328;
    color: black;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-family: arial;
    font-weight: 700;
    font-size: 15px;
}

button:hover{
    background-color: black;
    color: white;
}

.edit {
    padding: 5px 10px;
    background-color: yellow;
    color: black;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    font-family: arial;
    font-weight: 700;
    font-size: 15px;
}

.edit:hover{
    background-color: black;
    color: white;
}

/* Initial state for the alert (hidden and positioned below) */
.alert {
    display: none;
    transform: translateY(20px); /* Start slightly below */
    opacity: 0; /* Initially invisible */
    transition: transform 0.5s ease, opacity 0.5s ease; /* Smooth slide-up and fade-in */
    position: relative;
}

/* Active state (when the alert is shown) */
.alert.show {
    display: block;
    transform: translateY(0); /* Slide into place */
    opacity: 1; /* Fade in */
}


/* Add pointer cursor and red color on row hover */
#studentTable tbody tr {
    cursor: pointer; /* Show pointer cursor */
    transition: background-color 0.3s ease; /* Smooth color transition */
}

#studentTable tbody tr:hover {
    background-color: white; /* Change to red on hover */
    color: black; /* Optional: Change text color to white for better contrast */
}

.whatsapp-button {
    padding: 5px 10px;
    background-color: #ea2328; /* WhatsApp green */
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    font-family: Arial, sans-serif;
    font-weight: bold;
    font-size: 15px;
    
}

.whatsapp-button:hover {
    background-color: black;
    color: white;
}

h3{
    margin-top: 50px;
}

.update :hover{
    background-color: black;
    color: white;
}

.update{
    background-color: white;
    color: black;
    border: 1px solid black;
}

.submit{
    background-color: white;
    border: 1px solid black;
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 10px;
    padding-bottom: 10px;
}

.logo {
    margin-right:1200px ; /* Pushes the logo to the left */
    position: absolute;
   
}

.logo img {
    height: 80px;
}



</style>
<body>

    

    <div class="container">
        <aside class="sidebar">


    


            <h2>ADMIN MENU</h2>
            <ul>
                <li><a href="/dashboard" <?php echo $_SERVER['REQUEST_URI'] == '/dashboard' ? 'style="color:#ea2328;"' : ''; ?>>DASHBOARD</a></li>
                <li><a href="/students" <?php echo $_SERVER['REQUEST_URI'] == '/students' ? 'style="color:#ea2328;"' : ''; ?>>STUDENT LISTS</a></li>
               
                <li><a href="/notice" <?php echo $_SERVER['REQUEST_URI'] == '/notice' ? 'style="color:#ea2328;"' : ''; ?>>NOTIFICATION</a></li>
                
                
            </ul>

            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
            
                <button type="submit" id="logout" style="margin-top: 60px;" class="submit">LOG OUT</button>
           
            </form>

        </aside>

        <div class="main-content">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>


            <script>
                document.addEventListener("DOMContentLoaded", function() {
                var alert = document.querySelector('.alert');
                if (alert) {
                    alert.classList.add('show');  // Show and animate the alert
                }
            });
            
            </script>
            
        @endif
        
            <header>
                <div class="logo">
                    <a href="/dashboard"><img src="assets/images/school3.png" alt="Logo"></a>
                </div>
                <h1>STUDENT REGISTRATION TABLE LIST</h1>

                
            </header>


            <br>



            <section class="student-registration">


                

                <input type="text" id="searchBar" placeholder="Search students name..." onkeyup="searchStudents()" style="background-color: white;padding:10px;width:300px;">

                <table id="studentTable">
                    <thead>
                        <tr>
                            <th>FULL NAME</th>
                            <th>I/C NO</th>
                            <th>NATIONALITY</th>
                            <th>GENDER</th>
                            <th>RACE</th>
                            <th>MARITAL STATUS</th>
                            <th>ADDRESS</th>
                            <th>POSTCODE</th>
                            <th>STATE</th>
                            <th>CONTACT NO</th>
                            <th>GUARDIAN CONTACT NO</th>
                            <th>EMAIL</th>
                            <th>COURSE</th>
                            <th>SECONDARY SCHOOL</th>
                            <th colspan="2">STATUS</th>
                            <th colspan="2">REGISTRATION DATE</th>
                            <th colspan="2">ACTION</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr data-student-id="{{ $student->id }}">
                                <td>{{$student->full_name}}</td>
                                <td>{{$student->ic_no}}</td>
                                <td>{{$student->nationality}}</td>
                                <td>{{$student->gender}}</td>
                                <td>{{$student->race}}</td>
                                <td>{{$student->marital_status}}</td>
                                <td>{{$student->address}}</td>
                                <td>{{$student->postcode}}</td>
                                <td>{{$student->state}}</td>
                                <td>{{$student->contact_no}}</td>
                                <td>{{$student->guardian_contact_no}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->course}}</td>
                                <td colspan="2">{{$student->secondary_school}}</td>
                                <td>{{$student->status}}</td>
                                <td colspan="2">{{$student->created_at}}</td>


                                <td>
                                    <a href="{{ route('student.edit', $student->id) }}" class="edit">EDIT</a>
                                </td>
                            
                                <!-- Delete Button with confirmation -->
                                <td>
                                    <form action="{{ route('student.delete', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>


            <section class="student-info">
                <h3>STUDENT IMPORTANT DETAILS</h3>
                <div id="studentDetails" style="background-color: white; padding: 25px; border-radius: 5px; display: none;color:black;">
                    <p><strong>FULL NAME:</strong> <span id="detailFullName">{{ $student->full_name }}</span></p>
                    <p><strong>I/C NO:</strong> <span id="detailIC">{{ $student->ic_no }}</span></p>
                    <p><strong>GENDER:</strong> <span id="detailGender">{{ $student->gender }}</span></p>
                    <p><strong>NATIONALITY:</strong> <span id="detailNationality">{{ $student->nationality }}</span></p>
                    <p><strong>ADDRESS:</strong> <span id="detailAddress">{{ $student->address }}</span></p>
                    <p><strong>GUARDIAN CONTACT NO:</strong> <span id="detailGuardianContact">{{ $student->guardian_contact_no }}</span></p>
                    <p><strong>CONTACT NO:</strong> <span id="detailContact">{{ $student->contact_no }}</span></p>
                    <p><strong>EMAIL:</strong> <span id="detailEmail">{{ $student->email }}</span></p>
                    <p><strong>REGISTRATION DATE:</strong> <span id="detailDate">{{ $student->created_at }}</span></p>
            
                    <p><strong>STATUS:</strong> <span id="detailStatus">{{ $student->status }}</span></p>



                    {{-- <form id="updateDateForm">
                        @csrf
                        <label for="registration_date">Registration Date:</label>
                        <input type="date" id="registration_date" name="registration_date" required>
                    
                        <button type="button" id="updateButton">Update</button>
                    </form>
                     --}}


                    {{-- <label for="registration_date">Registration Date:</label>
                    <input type="date" id="registration_date" name="registration_date" value="{{ old('registration_date', now()->toDateString()) }}">
                    <button type="button" id="update_button">Update</button> --}}



                    <br> <br>
                    
                    <form action="{{ route('student.details') }}" method="POST" id="statusForm">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="student_id" id="studentId">
                    
                        <select name="status" id="statusSelect" class="form-control">
                            <option value="Already Contacted" {{ $student->status == 'Already Contacted' ? 'selected' : '' }}>Already Contacted</option>
                            <option value="Declined" {{ $student->status == 'Declined' ? 'selected' : '' }}>Declined</option>
                            <option value="Pending" {{ $student->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        </select>
                        <button type="submit" class="update btn-primary mt-3" id="updateStatusButton" window>UPDATE STATUS</button>
                    </form>
            
                    <br>
                    <a id="whatapp" href="https://wa.me/{{ $student->guardian_contact_no }}" class="whatsapp-button" target="_blank">
                        WHATSAPP GUARDIAN
                    </a>
                    &nbsp;
                    {{-- <a href="{{ route('email.guardian', $student->id) }}" class="email-button">
                        EMAIL GUARDIAN
                    </a> --}}

                    {{-- <a href="#" class="email-button" data-student-id="{{ $student->id }}" data-student-email="{{ $student->email }}">
                        EMAIL GUARDIAN
                    </a> --}}
                    

                    {{-- <a id="email" href="mailto:{{ $student->email }}" class="whatsapp-button" target="_blank">EMAIL GUARDIAN</a> --}}

                    <a href="{{ route('send.guardian.email', ['id' => $student->id]) }}"  id="sendmail" class="whatsapp-button" >EMAIL GUARDIAN</a>



                    {{-- <script>
                               document.querySelectorAll('.email-button').forEach(function(button) {
    button.addEventListener("click", function(event) {
        event.preventDefault(); // Prevent default link action

        // Get the student ID and email dynamically from the clicked button
        var studentId = button.getAttribute('data-student-id');
        var studentEmail = button.getAttribute('data-student-email');

        // Fetch the mailto link from the controller
        fetch(`/email/guardian/${studentId}`)
            .then(response => response.json())
            .then(data => {
                // Open the email client by setting window.location to the mailto link
                window.location.href = data.mailtoLink;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});
document.getElementById("email").removeAttribute("href");
document.getElementById("email").setAttribute("href", "mailto:" + student.email);


                    </script> --}}
                 
                 
                </div>
            </section>
            
            
            
            <script>
           // Function to display the selected student's details
           function showStudentDetails(student) {
    document.getElementById('detailFullName').textContent = student.fullName;
    document.getElementById('detailIC').textContent = student.ic_no;
    document.getElementById('detailGender').textContent = student.gender;
    document.getElementById('detailNationality').textContent = student.nationality;
    document.getElementById('detailAddress').textContent = student.address;
    document.getElementById('detailGuardianContact').textContent = student.guardianContact;
    document.getElementById('detailContact').textContent = student.contact_no;
    document.getElementById('detailEmail').textContent = student.email;
    document.getElementById('detailDate').textContent = student.created_at;
    document.getElementById('detailStatus').textContent = student.status || 'Pending';

    // Set the student's id in the hidden input field
    document.getElementById('studentId').value = student.id;

    // Show the details section
    document.getElementById('studentDetails').style.display = 'block';
    document.getElementById("whatapp").removeAttribute("href");
    document.getElementById("whatapp").setAttribute("href","https://wa.me/"+student.guardianContact);


    document.getElementById("sendmail").removeAttribute("href");
    document.getElementById("sendmail").setAttribute("href", "/send-email-to-guardian/" + student.id);

    sendEmailToGuardian(student.id);

    // fetch('/student.email/' + studentId)
    //     .then(response => response.json())
    //     .then(data => {
    //         // Get the email subject and body from the backend response
    //         const subject = 'Update from Synergy College';
    //         const body = `Hello Guardian,\n\nWe would like to update you regarding your child's current status. Please reach out for more details.\n\nBest regards,\nSynergy College`;

    //         // Generate the mailto link with the dynamic subject and body
    //         const mailtoLink = `mailto:${data.email}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;

    //         // Update the email button's href with the new mailto link
    //         document.getElementById('email').setAttribute('href', mailtoLink);

    //         // Optionally, trigger a click to open the email client automatically
    //         window.location.href = mailtoLink;
    //     })
    //     .catch(error => {
    //         console.error('Error:', error);
    //     });

}



// Attach click event listeners to each row
document.querySelectorAll('#studentTable tbody tr').forEach(row => {
    row.addEventListener('click', function() {
        const student = {
            id: row.getAttribute('data-student-id'), // Assuming each row has a data attribute for student ID
            fullName: row.cells[0].textContent,
            ic_no: row.cells[1].textContent,
            nationality: row.cells[2].textContent,
            gender: row.cells[3].textContent,
            address: row.cells[6].textContent,
            contact_no: row.cells[9].textContent,
            guardianContact: row.cells[10].textContent,
            email: row.cells[11].textContent,
            created_at: row.cells[15].textContent,
            status: row.cells[14].textContent,
            
        };
        showStudentDetails(student);

    });
});


function updateStatus(event) {
    event.preventDefault();  // Prevents the default link behavior

    // Prompt the user to choose a status
    const newStatus = prompt("Enter status: Already Contacted, Declined, or Pending");

    // Check if the status is valid
    if (newStatus && ['Already Contacted', 'Declined', 'Pending'].includes(newStatus)) {
        // Update the status text in the student details section
        const statusCell = document.getElementById('detailStatus');
        statusCell.textContent = newStatus;



        // Store the updated status in the hidden input
        const hiddenStatusField = document.getElementById('hiddenStatus');
        hiddenStatusField.value = newStatus;

        // Now proceed to WhatsApp in a new tab
        const guardianContact = document.getElementById('detailGuardianContact').textContent;
        const status = hiddenStatusField.value;  // Get the updated status

        // Open WhatsApp with the status passed as a query parameter
        window.open(`https://wa.me/${guardianContact}?text=${message}`, '_blank');

        
    } else {
        alert("Invalid status. Please choose one of the following: Already Contacted, Declined, Pending.");
    }
}





            </script>
            




        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>

<script>
    // Sample data to simulate automatic data collection
let students = [
    {
        firstName: "John",
        lastName: "Doe",
        email: "john.doe@example.com",
        phone: "(123) 456-7890",
        dob: "2000-01-01",
        registrationDate: new Date().toISOString().split('T')[0],
        course: "Computer Science",
        status: "Active"
    },
    {
        firstName: "Jane",
        lastName: "Smith",
        email: "jane.smith@example.com",
        phone: "(987) 654-3210",
        dob: "1999-05-15",
        registrationDate: new Date().toISOString().split('T')[0],
        course: "Mathematics",
        status: "Active"
    }
];

// Function to render the student table
// function renderTable() {
//     const tbody = document.getElementById('studentTable').querySelector('tbody');
//     tbody.innerHTML = ''; // Clear existing rows

//     students.forEach((student, index) => {
//         const row = document.createElement('tr');
//         row.innerHTML = `
//             <td>${student.firstName}</td>
//             <td>${student.lastName}</td>
//             <td>${student.email}</td>
//             <td>${student.phone}</td>
//             <td>${student.dob}</td>
//             <td>${student.registrationDate}</td>
//             <td>${student.course}</td>
//             <td>${student.status}</td>
//             <td>
//                 <button class="edit" onclick="editStudent(${index})">Edit</button>
//                 <button onclick="deleteStudent(${index})">Delete</button>
//             </td>
//         `;
//         tbody.appendChild(row);
//     });
// }

// Function to edit a student
function editStudent(index) {
    students[index].firstName = prompt("Edit first name:", students[index].firstName) || students[index].firstName;
    students[index].lastName = prompt("Edit last name:", students[index].lastName) || students[index].lastName;
    students[index].email = prompt("Edit email:", students[index].email) || students[index].email;
    students[index].phone = prompt("Edit phone number:", students[index].phone) || students[index].phone;
    students[index].dob = prompt("Edit date of birth (YYYY-MM-DD):", students[index].dob) || students[index].dob;
    students[index].course = prompt("Edit course:", students[index].course) || students[index].course;
    renderTable();
}

// Function to delete a student
function deleteStudent(index) {
    if (confirm("Are you sure you want to delete this student?")) {
        students.splice(index, 1);
        renderTable();
    }
}

// Initial render
renderTable();

</script>

<script>
    function searchStudents() {
    const searchTerm = document.getElementById('searchBar').value.toLowerCase();
    const rows = document.querySelectorAll('#studentTable tbody tr');
    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        const fullName = cells[0].textContent.toLowerCase();
        if (fullName.includes(searchTerm)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

</script>


{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // When the update button is clicked
        $('#updateButton').click(function() {
            // Get the value of the selected date
            var registrationDate = $('#registration_date').val();
            
            // If the date is empty, alert the user
            if (!registrationDate) {
                alert('Please select a registration date.');
                return;
            }

            // Send AJAX request to the server
            $.ajax({
                url: "{{ route('students.updateDate') }}", // The route for the updateDate method
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    registration_date: registrationDate // Send the selected date
                },
                success: function(response) {
                    // Handle the response (filter students and update the table)
                    console.log(response); // Log the response to check if data is returned correctly

                    // Clear the table (or replace it with filtered data)
                    $('#studentsTable tbody').empty(); 

                    // Loop through the filtered students and append to the table
                    response.forEach(function(student) {
                        $('#studentsTable tbody').append(
                            '<tr>' +
                                '<td>' + student.name + '</td>' +
                                '<td>' + student.email + '</td>' +
                                '<td>' + student.created_at + '</td>' + // Registration Date or any other field
                            '</tr>'
                        );
                    });
                },
                error: function(xhr, status, error) {
                    // Handle any errors
                    alert('Error: ' + error);
                }
            });
        });
    });
</script>
 --}}






