<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    
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

.edit{
    background-color: #20ff11;
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
    .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    padding-top: 60px;
    
    }

    .modal-content {
        
        background-color: #fff;
        color: black;
        margin: auto;
        padding: 20px;
        border-radius: 10px;
        width: 40%;
        text-align: left;
        box-shadow: 0px 0px 15px rgba(255, 255, 255, 0.2);
    }

    .close {
        float: right;
        font-size: 28px;
        font-weight: bold;
        color: #555;
        cursor: pointer;
    }

    .close:hover {
        color: black;
    }

    input[type="text"],
    input[type="date"],
    input[type="time"],
    input[type="file"] {
        width: 90%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .submit {
        background-color: #ea2328;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    .submit:hover {
        background-color: #ff5722;
    }

</style>

<body>
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
        <header>
            <div class="logo">
                <a href="/dashboard"><img src="assets/images/school3.png" alt="Logo"></a>
            </div>
            <h1>CLICK TO UPDATE NEWEST IMAGE</h1>
        </header>
        <div id="addEventModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Add New Event</h2>
                <form  method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="title">Event Title:</label>
                    <input type="text" id="title" name="title" required>
        
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" required>
        
                    <label for="time">Time:</label>
                    <input type="text" id="time" name="time" required>
        
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" required>
        
                    <label for="image">Upload Image:</label>
                    <input type="file" id="image" name="image" accept="image/*" >
        
                    <button type="submit" class="submit">Add Event</button>
                </form>
            </div>
        </div>

       
        <br><br>
        <button onclick="openModal()" class="de">Add Event</button>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Event Title</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td><a href="{{$event->image }}" target="_blank">
                            <img src="{{ $event->image }}" alt="{{ $event->title }}" style="width: 100px;">
                            </a></td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->date }}</td>
                        <td>{{ $event->time }}</td>
                        <td>{{ $event->location }}</td>
                        <td>
                            <button type="button" data-id='{{ $event->id }}' data-title="{{ $event->title }}" data-date='{{ $event->date }}' data-time='{{ $event->time }}' data-location="{{ $event->location }}" onclick="editModal()" class="edit">Edit</button>
                            <form action="{{ route('delete_event', $event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="de">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
       
        </div>
        <script>
            function openModal() {
                var modal=document.getElementById("addEventModal");
                modal.style.display = "block";
                document.getElementById("title").value = '';
                document.getElementById("date").value = '';
                document.getElementById("time").value = '';
                document.getElementById("location").value = '';
                modal.querySelector("form").setAttribute("action", "{{ route('add_event') }}");

            }

            function editModal(){
                var modal = document.getElementById("addEventModal");
                var target = event.currentTarget;
                var id = target.getAttribute('data-id') || 0;
                var title = target.getAttribute('data-title') || '';
                var date = target.getAttribute('data-date') || '';
                var time = target.getAttribute('data-time') || '';
                var location = target.getAttribute('data-location') || '';

                document.getElementById("title").value = title;
                document.getElementById("date").value = date;
                document.getElementById("time").value = time;
                document.getElementById("location").value = location;
                modal.querySelector("form").setAttribute("action", "{{ route('edit_event', ':id') }}".replace(':id', id));
                modal.style.display = "block";
            }
        
            function closeModal() {
                document.getElementById("addEventModal").style.display = "none";
            }
        
            window.onclick = function(event) {
                var modal = document.getElementById("addEventModal");
                if (event.target == modal) {
                    closeModal();
                }
            }
        </script>
        
</body>
