<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include flatpickr CSS and JS in the <head> section -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <title>Student Calendar</title>
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
            padding-left: 30px;
            padding-right: 30px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
        }

        .day {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            background-color: #18153d;
        }

        .day h4 {
            margin: 0;
            font-size: 16px;
            color: #ea2328;
        }

        .student-list {
            margin-top: 10px;
        }

        .student-list p {
            margin: 0;
            font-size: 14px;
            color: white;
        }

        .empty {
            text-align: center;
            color: #aaa;
        }

        .month-navigation {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
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
        }

        .submit:hover {
            background-color: black;
            color: white;
            cursor: pointer;
        }

        .next {
            background-color: lightcyan;
            padding: 10px;
            color: black;
            border-radius: 10px;
        }

        .next:hover {
            background-color: #ff5722;
            padding: 10px;
            color: white;
            border-radius: 10px;
        }
        /* Modal styles */
.modal {
    display: none; 
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.4); 
    overflow: auto;
    padding-top: 60px;
}

.modal-content {
    background-color: #fff;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
    text-align: center;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

#datepicker_input {
    margin-top: 10px;
    padding: 10px;
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
}

.de{
    background-color: #ff5722;
    color: white;
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 10px;
    padding-bottom: 10px;
    border-radius: 5px;
    font-weight: 700;
    font-size: 15px;
    border: none;
    cursor: pointer;
}

.de:hover{
    background-color: black;
}


    </style>
</head>

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
            <header>
                <div class="logo">
                    <a href="/dashboard"><img src="assets/images/school3.png" alt="Logo"></a>
                </div>
                <h1>STUDENT REGISTRATION CALENDAR</h1>
            </header>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <br><br>

            <div class="month-navigation">
                <a href="{{ route('showCalendar', ['month' => \Carbon\Carbon::parse($currentMonth)->subMonth()->format('Y-m')]) }}" style="text-decoration: none;" class="next">PREVIOUS</a>
                <span style="font-size: 25px;">{{ strtoupper(\Carbon\Carbon::parse($currentMonth)->format('F Y')) }}</span>
                <a href="{{ route('showCalendar', ['month' => \Carbon\Carbon::parse($currentMonth)->addMonth()->format('Y-m')]) }}" style="text-decoration: none;" class="next">NEXT</a>
            </div>

            <div class="calendar">
                @for ($i = 1; $i <= \Carbon\Carbon::parse($currentMonth)->daysInMonth; $i++)
                    @php
                        $currentDay = \Carbon\Carbon::parse($currentMonth)->startOfMonth()->addDays($i - 1);
                        $date = $currentDay->toDateString();
                        $studentsForDate = $groupedStudents[$date] ?? [];
                    @endphp
            
                    <div class="day">
                        <h4>{{ $currentDay->format('D, d M') }}</h4>
            
                        <div class="student-list">
                            @if ($studentsForDate && $studentsForDate->isNotEmpty())
                                @foreach ($studentsForDate as $student)
                                    <p style="color: yellow;font-size:18px;">{{ $student->full_name }}</p>
                            <br>
                                    @if($student->appointment_date)
                                        <p style="font-size:15px;"><strong>APPOINTMENT DATE:</strong><br> {{ \Carbon\Carbon::parse($student->appointment_date)->format('D, d M Y') }}</p>
                                        
                                        <form action="{{ route('deleteAppointment', $student->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="de" >DELETE APPOINTMENT</button>
                                        </form>
                                        
                                    @else
                                        <p>No appointment set</p>
                                    @endif
            
                                    <br>
            
                                    <!-- Appointment Assignment Form -->
                                    <form action="{{ route('assignAppointment', $student->id) }}" method="POST">
                                        @csrf
                                        <label for="appointment_date">SELECT DATE:</label>
                                        <input type="date" name="appointment_date" id="appointment_date" value="{{ old('appointment_date', $date) }}"/>
            
                                        <button type="submit" class="submit">ASSIGN APPOINTMRNT</button>
                                    </form>
            
                                    <br>
                                @endforeach
                            @else
                                <p class="empty">No students</p>
                            @endif
                        </div>
                    </div>
                @endfor
            </div>
            
</body>



</html>
