<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
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
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background: #ea2328;
        color: black
    }
    tr:hover {
        background: #f1f1f1;
    }
    .edit-btn, .delete-btn {
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        padding: 5px 10px;
        cursor: pointer;
        text-decoration-line: none;
    }
    .edit-btn {
        
        background: #4CAF50;
        color: white;
    }
    .delete-btn {
        background: #f44336;
        color: white;
    }
    #searchInput {
        margin-bottom: 10px;
        padding: 8px;
        width: 100%;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .dropdown {
    position: relative;
    display: inline-block;
    }

    .dropdown-btn {
        background-color: #007bff;
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .dropdown-btn:hover {
        background-color: #0056b3;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 120px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        border-radius: 4px;
    }

    .dropdown-content a {
        color: black;
        padding: 8px 12px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
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
                <h2>Content List</h2>
                <input type="text" id="searchInput" placeholder="Search..." onkeyup="searchTable()">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>image review</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections as $index=>$section)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $section->section }}</td>
                                <td>{{ $section->image_path }}</td>
                                
                                <td>
                                    @if($section->id==11)
                                        <div class="dropdown">
                                            <button class="dropdown-btn">Choose course ▼</button>
                                            <div class="dropdown-content">
                                               
                                                
                                                @foreach (json_decode($section->content->content) as $course=>$content)
                                                    
                                                    <a href="{{ route('modifycontent', ['id'=>$section->id,'course'=>$course]) }}">{{ $course }}</a>
                                                @endforeach 
                                                
                                                
                                            </div>
                                        </div>
                                    @else
                                        <a class="edit-btn" href="{{ route('modifycontent',$section->id); }}" >Modify</a></td>
                                    @endif
                                    
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

</body>
</html>
