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

        .chart{
            width: 45%;
            position: absolute;
            margin-left: 630px;
        
        }

        .chart-container{
            position: absolute;
        }

        .contacted-people-list{
            position: absolute;
            margin-top: 400px;
            margin-left: 680px;
        }

        th,td{
            border: 1px solid white;
            padding: 20px;
            width: 180px;
            height: 10px;
            text-align: center;
        }

        .student-appointments{
            position: absolute;
            margin-top: 680px;
            margin-left: ;
        }

        .head{
            background-color: #CF9FFF;
            color: black;
        }

        .head1{
            background-color: paleturquoise;
            color: black;
        }

        .head2{
            background-color: white;
            color: black;
        }

        .head3{
            background-color: white;
            color: black;
        }

        h3{
            font-size: 20px;
        }

        table{
            width: 90%;
        }
  
    </style>
</head>

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
        @yield('content')
    </div>

   

</body>
</html>
