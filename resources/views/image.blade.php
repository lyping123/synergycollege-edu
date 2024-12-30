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
            color: black;
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

/* Table Styles */
table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 16px;
        text-align: left;
        background-color: #222;
        border-radius: 10px;
        overflow: hidden;
    }

    th, td {
        padding: 12px 15px;
    }

    thead {
        background-color: #ea2328;
        color: white;
    }

    tbody tr:nth-child(even) {
        background-color: #333;
    }

    tbody tr:nth-child(odd) {
        background-color: #444;
    }

    tbody tr:hover {
        background-color: #555;
        cursor: pointer;
    }

    th {
        text-transform: uppercase;
        letter-spacing: 0.1em;
        font-size: 14px;
        border-bottom: 2px solid #18153d;
    }

    td {
        color: #ddd;
    }

    img {
        border-radius: 5px;
        max-width: 100px;
        cursor: pointer;
    }

    form button {
        background-color: #ea2328;
        border: none;
        padding: 10px 15px;
        color: white;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
    }

    form button:hover {
        background-color: #ff5722;
        color: black;
    }

    form input[type="file"] {
        background-color: #333;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px;
    }

    form input[type="file"]::-webkit-file-upload-button {
        background-color: #ea2328;
        border: none;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    form input[type="file"]::-webkit-file-upload-button:hover {
        background-color: #ff5722;
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
                <li><a href="/appointment" <?php echo $_SERVER['REQUEST_URI'] == '/appointment' ? 'style="color:#ea2328;"' : ''; ?>>APPOINTMENT VERIFY</a></li>
                <li><a href="/image" <?php echo $_SERVER['REQUEST_URI'] == '/image' ? 'style="color:#ea2328;"' : ''; ?>>UPDATE IMAGE</a></li>
                <li><a href="/update_new" <?php echo $_SERVER['REQUEST_URI'] == '/update_new' ? 'style="color:#ea2328;"' : ''; ?>>UPDATE CONTACT</a></li>
               
            </ul>
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
                <h1>CLICK TO UPDATE NEWEST IMAGE</h1>
            </header>

           
            <br><br>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $image)
                    <tr>
                        <td>{{ $image->id }}</td>
                        <td>{{ $image->image_name }}</td>
                        <td>
                            <a href="{{ asset('assets/images/' . $image->image_url) }}" target="_blank">
                            <img src="{{ asset('assets/images/' . $image->image_url) }}" alt="{{ $image->image_name }}" style="width: 100px;">
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('updateImage', $image->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="image" required>
                                <button type="submit">Update</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
           
            </div>
            
</body>



</html>
