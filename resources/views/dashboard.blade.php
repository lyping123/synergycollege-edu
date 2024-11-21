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
        height: 100vh;
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

    .student-registration {
        margin-top: 20px;
    }

    .chart-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    max-width: 600px; /* Adjust max width as needed */
    max-height: 600px;
}

#studentChart {
    width: 100% !important;
    height: 100% !important;
}

.submit{
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

.submit:hover{
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
            <header>
                <div class="logo">
                    <a href="/dashboard"><img src="assets/images/school3.png" alt="Logo"></a>
                </div>
                <h1>STUDENT'S REGISTRATION STATUS DASHBOARD</h1>
            </header>

            <section class="student-registration">
                {{-- <h2>Student Registration</h2> --}}
                <div class="chart-container">
                    <canvas id="studentChart"></canvas>
                </div>
                
            </section>
        </div>
    </div>

   <script>
    document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('studentChart').getContext('2d');

    // Pass the PHP data to JavaScript (this data comes from your controller)
    const studentStatus = @json($studentStatus); // studentStatus is now a JavaScript object

    // Extract counts from the studentStatus array
    const pendingCount = studentStatus.contact2; // Pending count
    const declinedCount = studentStatus.contact1; // Declined count
    const alreadyContactedCount = studentStatus.contact; // Already Contacted count

    const studentData = {
        labels: ['PENDING', 'DECLINED', 'ALREADY CONTACTED'],
        datasets: [{
            data: [pendingCount, declinedCount, alreadyContactedCount],
            backgroundColor: ['#FF5722', '#FFC107', '#69F0AE'],
        }]
    };

    const config = {
        type: 'pie',
        data: studentData,
        options: {
            responsive: true,
            maintainAspectRatio: true,
            aspectRatio: 1,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        color: 'white', // Set label color to white
                        font: {
                            size: 15
                        }
                    }
                },
                datalabels: {
                    display: true,
                    color: 'white',
                    font: {
                        size: 20,
                        weight: 'bold'
                    },
                    formatter: function(value, context) {
                        let percentage = (value / context.dataset._meta[Object.keys(context.dataset._meta)[0]].total * 100).toFixed(1);
                        return `${percentage}%`;
                    }
                },
                title: {
                    display: true,
                    text: 'PIE CHART OF STUDENT REGISTRATION STATUS',
                    color: 'white',
                    font: {
                        size: 25,
                    }
                },
                tooltip: {
                    position: 'nearest',
                    bodyFont: {
                        size: 20
                    },
                    padding: 10, // Add padding for readability
                    boxPadding: 10, // Ensures tooltip box is fully visible
                    overflow: 'clamp' // Keeps tooltip inside chart bounds
                }
            },
            hover: {
                mode: 'nearest',
                intersect: false,
                animationDuration: 500
            }
        }
    };

    // Create the chart
    new Chart(ctx, config);
});

</script>

</body>
</html>
