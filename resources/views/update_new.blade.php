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
            padding-left: 20px;
            padding-right: 30px;
            padding-top: 17px;
           
        }

        header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo img {
            height: 80px;
        }

        h1 {
            margin-left: 20px;
            color: white;
        }

        .content {
            background-color: #202040;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #25254a;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        thead {
            background-color: #ea2328;
            color: #fff;
        }

        tbody tr:nth-child(odd) {
            background-color: white;
        }

        tbody tr:nth-child(even) {
            background-color: white;
        }

        tbody tr:hover {
            background-color:#555;
            cursor: pointer;
        }

        th {
            text-transform: uppercase;
            font-size: 14px;
        }

        input[type="text"], input[type="email"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            outline: none;
            transition: 0.3s;
        }

        input[type="text"]:focus, input[type="email"]:focus {
            background-color: #444;
            border-color: #ea2328;
        }

        button.de {
            background-color: #ea2328;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            font-weight: bold;
            transition: 0.3s;
        }

        button.de:hover {
            background-color: #ff5722;
            cursor: pointer;
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
                    <li><a href="/students" <?php echo $_SERVER['REQUEST_URI'] == '/students' ? 'style="color:#ea2328;"' : ''; ?>>STUDENT LISTS</a></li>
                    
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
                    <h1>UPDATE NEWEST DIRECTORY CONTACT INFORMATION</h1>
                </header>
    
                <div class="content">
                 
    
                    @if(session('success'))
                    <div style="color: white;">{{ session('success') }}</div>
                    @endif
    
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($staff as $person)
                            <tr>
                                <form action="{{ route('update_contact', $person->id) }}" method="POST">
                                    @csrf
                                    <td>
                                        <input type="text" name="name" value="{{ $person->name }}" required>
                                    </td>
                                    <td>
                                        <input type="email" name="email" value="{{ $person->email }}" required>
                                    </td>
                                    <td>
                                        <input type="text" name="phone" value="{{ $person->phone }}" required>
                                    </td>
                                    <td>
                                        <button type="submit" class="de">UPDATE</button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
            
</body>



</html>
